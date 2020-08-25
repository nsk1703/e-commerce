<?php

namespace Ecommerce\EcommerceBundle\Controller;

//use http\Env\Request;
use Ecommerce\EcommerceBundle\Entity\Commande;
use Users\UsersBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller
{
    public function prepareAction(Request $request)
    {
        $session = $request->getSession();
        $entityManager = $this->getDoctrine()->getManager();

//        Pour eviter de rajouter deux fois la commande a la base de donnees, lorsque l'on fait un retour
        if (!$session->has('commande'))
            $commande = new Commande();
        else
            $commande = $entityManager->getRepository('EcommerceEcommerceBundle:Commande')->find($session->get('commande'));

        $commande->setDate(new \DateTime());
        $commande->setUsers($this->container->get('security.token_storage')->getToken()->getUser());
        $commande->setValidate(0);
        $commande->setReference(0);
        $commande->setProducts($this->bill());

        if (!$session->has('commande'))
        {
            $entityManager->persist($commande);
            $session->set('commande', $commande);
        }
        $entityManager->flush();
//        return $this->render('EcommerceEcommerceBundle:Commande:prepare.html.twig', array(
//
//        ));
    }

}
