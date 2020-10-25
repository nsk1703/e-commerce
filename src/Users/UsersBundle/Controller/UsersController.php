<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function cityAction($cp)
    {
        $em = $this->getDoctrine()->getManager();
        $cityPostalCode = $em->getRepository('UsersUsersBundle:VillesFranceFree')->findOneBy(array('villeCodePostal' => $cp));

        if ($cityPostalCode)
        {
            $city = $cityPostalCode->getVilleNom();
        }else{
            $city= 'Aucune Ville';
        }

        $response = new JsonResponse();
        return $response->setData(array('city' => $city));
    }

    public function billsAction()
    {
//        Recuperation des factures pour l'utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $bills = $em->getRepository('EcommerceEcommerceBundle:Commande')->byBill($this->getUser());

        return $this->render('@UsersUsers/Default/layout/bill.html.twig', array(
            'bills' => $bills
        ));
    }


    public function billPDFAction($id)
    {
        //        Recuperation des factures pour l'utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $bill = $em->getRepository('EcommerceEcommerceBundle:Commande')->findOneBy(
                                    array(
                                        'users' => $this->getUser(),
                                        'validate' => 1,
                                        'id' => $id
                                    )
        );

        if (!$bill)
        {
            $this->get('session')->getFlashBag()->add('error', 'Aucune facture disponible');
            return $this->redirect($this->generateUrl('bills'));
        }

        // You can send the html as you want
        //   $html = '<h1>Plain HTML</h1>';

        // but in this case we will render a symfony view !
        // We are in a controller and we can use renderView function which retrieves the html from a view
        // then we send that html to the user.

        $this->container->get('setNewBill')->returnPDFResponseFromHTML($bill);

    }
}
