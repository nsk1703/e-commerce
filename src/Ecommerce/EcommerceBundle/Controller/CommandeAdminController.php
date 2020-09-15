<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CommandeAdminController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em =$em;
    }

    public function CommandesAction()
    {
        $repository = $this->em->getRepository('EcommerceEcommerceBundle:Commande');
        $commandes = $repository->findAll();

        return $this->render('Commande/index.html.twig',
                array('commandes' => $commandes)
        );
    }

    public function showBillAction($id)
    {
        //        Recuperation des factures pour l'utilisateur courant
        $bill = $this->em->getRepository('EcommerceEcommerceBundle:Commande')->find($id);

        if (!$bill)
        {
            $this->get('session')->getFlashBag()->add('error', 'Aucune facture disponible');
            return $this->redirect($this->generateUrl('adminCommandes_index'));
        }

        $this->container->get('setNewBill')->returnPDFResponseFromHTML($bill);

    }

}