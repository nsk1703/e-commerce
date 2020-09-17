<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CommandeAdminController extends Controller
{

    public function CommandesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Commande');
        $commandes = $repository->findAll();

        return $this->render('Commande/index.html.twig',
                array('commandes' => $commandes)
        );
    }

    public function showBillAction($id)
    {
        //        Recuperation des factures pour l'utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $bill = $em->getRepository('EcommerceEcommerceBundle:Commande')->find($id);

        if (!$bill)
        {
            $this->get('session')->getFlashBag()->add('error', 'Aucune facture disponible');
            return $this->redirect($this->generateUrl('adminCommandes_index'));
        }

        $this->container->get('setNewBill')->returnPDFResponseFromHTML($bill);

    }

}