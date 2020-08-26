<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Commande;
use Users\UsersBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller
{
    public function generateToken()
    {
        try {
            return rtrim(strtr(base64_encode(random_bytes(20)), '+/', '-_'), '=');

        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function bill(Request $request)
    {
//        permet de definir une chaine aleatoire qui va nous servir de token pour n'importe quel API
//        $generator = $this->container->get('security.csrf.token_generator');

        $session = $request->getSession();
        $address = $session->get('address');
        $basket = $session->get('basket');
        $entityManager = $this->getDoctrine()->getManager();

        $commande = array();
        $totalHT = 0;
        $totalTTC = 0;

        $bill = $entityManager->getRepository('UsersUsersBundle:UsersAddress')->find($address['bill']);
        $deliver = $entityManager->getRepository('UsersUsersBundle:UsersAddress')->find($address['deliver']);
        $products = $entityManager->getRepository('EcommerceEcommerceBundle:Products')->findArray(array_keys($session->get('basket')));

        foreach ($products as $product) {
            $priceHT = ($product->getPrice() * $basket[$product->getId()]);
            $priceTTC = ($product->getPrice() * $basket[$product->getId()]) / $product->getTva()->getMultiplicate();
            $totalHT += $priceHT;
            $totalTTC += $priceTTC;

            if (!isset($commande['tva']['%' . $product->getTva()->getValeur()]))
                $commande['tva']['%' . $product->getTva()->getValeur()] = round($priceTTC - $priceHT, 2);
            else
                $commande['tva']['%' . $product->getTva()->getValeur()] += round($priceTTC - $priceHT, 2);

            $commande['product'][$product->getId()] = array('reference' => $product->getName(),
                'quantity' => $basket[$product->getId()],
                'priceHT' => round($product->getPrice(), 2),
                'priceTTC' => round($product->getPrice() / $product->getTva()->getMultiplicate(), 2)
            );
        }

        $commande['deliver'] = array('prenom' => $deliver->getPrenom(),
            'nom' => $deliver->getNom(),
            'telephone' => $deliver->getTelephone(),
            'addresse' => $deliver->getAddresse(),
            'cp' => $deliver->getCp(),
            'ville' => $deliver->getVille(),
            'pays' => $deliver->getPays(),
            'complement' => $deliver->getComplement());

        $commande['bill'] = array('prenom' => $bill->getPrenom(),
            'nom' => $bill->getNom(),
            'telephone' => $bill->getTelephone(),
            'addresse' => $bill->getAddresse(),
            'cp' => $bill->getCp(),
            'ville' => $bill->getVille(),
            'pays' => $bill->getPays(),
            'complement' => $bill->getComplement());

        $commande['priceHT'] = round($totalHT, 2);
        $commande['priceTTC'] = round($totalTTC, 2);
        $commande['token'] = bin2hex($this->generateToken());

        return $commande;
    }

    public function prepareOrderedAction(Request $request)
    {
        $session = $request->getSession();
//        $session->clear();
        $entityManager = $this->getDoctrine()->getManager();

//        Pour eviter de rajouter deux fois la commande a la base de donnees, lorsque l'on fait un retour
        if ($session->has('commande'))
            $commande = $entityManager->getRepository('EcommerceEcommerceBundle:Commande')->find($session->get('commande'));
        else
            $commande = new Commande();

        $commande->setValidate(0);
        $commande->setDate(new \DateTime());
        $commande->setReference(0);
        $commande->setUsers($this->container->get('security.token_storage')->getToken()->getUser());
        $commande->setCommande($this->bill($request));

        if (!$session->has('commande')){
            $entityManager->persist($commande);
            $session->set('commande', $commande);
        }

        $entityManager->flush();

        return new Response($commande->getId());
    }

//    Cette methode remplace l'api banque
//    Gestion de paiement par l'api PAYPAL sur symfony3.4
    public function validateOrderedAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('EcommerceEcommerceBundle:Commande')->find($id);

        if (!$commande || $commande->getValidate() == 1)
            throw $this->createNotFoundException('La Commande n\'existe pas');

        $commande->setValidate(1);
        $commande->setReference(1); //Ajout d'un service
        $em->flush();

        $session = $request->getSession();
        $session->remove('address');
        $session->remove('basket');
        $session->remove('commande');

        $this->get('session')->getFlashBag()->add('success', 'Votre commande est valide avec succes!');
        return $this->redirect($this->generateUrl('list_product'));
    }
}
