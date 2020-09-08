<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Users\UsersBundle\Entity\UsersAddress;
use Users\UsersBundle\Form\UsersAddressType;

class BasketController extends Controller
{
    public function basketAction(Request $request)
    {
//        Definition de la variable session "basket" en l'attribuant le type tableau
        $session = $request->getSession();
        if(!$session->has('basket')) $session->set('basket', array());

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->findArray(array_keys($session->get('basket')));

        return $this->render('@EcommerceEcommerce/Basket/layout/basket.html.twig', array(
            'products' => $products,
//                    Recuperation de la session basket
            'basket' => $session->get('basket')
        ));
    }

    public function addBasketAction(Request $request, $id)
    {
//        recuperation de notre session
        $session = $request->getSession();
//        $session->destroy();
//        Si la session n'a pas pour parametre 'basket', alors on la set en tableau et recupere dans la variable $basket
        if(!$session->has('basket')) $session->set('basket', array());
            $basket = $session->get('basket');

//       $basket(ID OF PRODUCT) => QUANTITY
//
        if (array_key_exists($id, $basket)){
            if ($request->query->get('qty') != null)
                $basket[$id] = $request->query->get('qty');
            $session->getFlashBag()->add('success', 'quantity modified with success');
        }else{
            if ($request->query->get('qty') != null){
                $basket[$id] = $request->query->get('qty');
            }else{
                $basket[$id] = 1;
            }
            $session->getFlashBag()->add('success', 'product is adding with success');
        }

        $session->set('basket', $basket);

        return $this->redirect($this->generateUrl('basket'));
    }

    public function deleteBasketAction(Request $request, $id)
    {
        $session = $request->getSession();
        $basket = $session->get('basket');

        if (array_key_exists($id, $basket)){
            unset($basket[$id]);
            $session->set('basket', $basket);
            $session->getFlashBag()->add('success', 'product deleted with success');
        }

        return $this->redirect($this->generateUrl('basket'));
    }

    public function deleteAddressAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('UsersUsersBundle:UsersAddress');
        $userAddress = $repository->find($id);

//        Recuperation de l'utilisateur courant
        $userCurrent = $this->container->get('security.token_storage')->getToken()->getUser();

        if ($userCurrent != $userAddress->getUsers() || !$userAddress)
                return $this->redirect($this->generateUrl('deliver'));

        $entityManager->remove($userAddress);
        $entityManager->flush();

        return  $this->redirect($this->generateUrl('deliver'));
    }

    public function deliverAction(Request $request)
    {
//        Recuperation de l'utilisateur courant
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $usersAddress = new UsersAddress();
        $form = $this->createForm(UsersAddressType::class, $usersAddress);

//        Si une methode POST a ete retourne du formulaire, et si il est valid
        if ($request->getMethod() == "POST")
        {
//             Recupere les information du $request, verifie si c'est un post et va irriguer la
//            classe 'usersAddress avec les informations qu'il va recuperer au niveau du createForm
            $form->handleRequest($request);

//            Si les entrees du formulaire sont valides?
            if ($form->isValid())
            {
                $entityManager = $this->getDoctrine()->getManager();
                $usersAddress->setUsers($user);
                $entityManager->persist($usersAddress);
                $entityManager->flush();

                return $this->redirect($this->generateUrl('deliver'));
            }
        }

        return $this->render('@EcommerceEcommerce/Basket/layout/deliver.html.twig', array(
            'user' => $user,
            'form' => $form->createView()
        ));
    }

    public function setDeliverOnSession(Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('address')) $session->set('address', array());
        $address = $session->get('address');

//        Recuperation des informations des differents formulaire
            $deliver = $request->get('deliver');
            $bill = $request->get('bill');

        if ($deliver != null && $bill != null)
        {
            $address['deliver'] = $deliver;
            $address['bill'] = $bill;
        }else{
            return $this->redirect($this->generateUrl('validate'));
        }
//      on donne des valeurs a la session

        $session->set('address', $address);
        return $this->redirect($this->generateUrl('validate'));

    }

    public function validateAction(Request $request)
    {
//        Si une methode POST a ete retourne
        if ($request->getMethod() == 'POST')
            $this->setDeliverOnSession($request);

//        Creation de l'entityManager et du repository
        $em = $this->getDoctrine()->getManager();

//        Appele de la methode 'prepare' du controller commande par la methode "forward";
//        "getContent" pour recuperer le return
        $prepareCommand = $this->forward('EcommerceEcommerceBundle:Commande:prepareOrdered');
        $commande = $em->getRepository('EcommerceEcommerceBundle:Commande')->find($prepareCommand->getContent());

        return $this->render('@EcommerceEcommerce/Basket/layout/validate.html.twig', array('commande' => $commande));
    }

//    Retourne le nombre de produits contenus dans le panier
    public function menuAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('basket'))
            $items = 0;
        else
//            Compteur du nombre de produits dans le panier
            $items = count($session->get('basket'));

        return $this->render('@EcommerceEcommerce/Basket/modulesUsed/info_basket.html.twig', array(
                        'items' => $items
        ));
    }


}
