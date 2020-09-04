<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function billsAction()
    {
//        Recuperation des factures pour l'utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $bills = $em->getRepository('EcommerceEcommerceBundle:Commande')->byBill($this->getUser());

        return $this->render('@UsersUsers/Default/layout/bill.html.twig', array(
            'bills' => $bills
        ));
    }

    public function returnPDFResponseFromHTML($html, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $bill = $em->getRepository('EcommerceEcommerceBundle:Commande')->findOneBy(array(
            'users' => $this->getUser(),
            'validate' => 1,
            'id' => $id
        ));

//        set_time_limit(30); uncomment this line according to your needs
//        If you are not in a controller, retrieve of some way the service container and then retrieve it
//        $pdf = $this->container->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//       if you are in a controlller use :
        $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('MOKOLO');
        $pdf->SetTitle(('Bill_'.$bill->getReference()));
        $pdf->SetSubject('Bill to Paid');

        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', 'css', 11, '', true);
//        $pdf->SetFont('real', 'css', 11, '', true);
//        $pdf->SetMargins(20, 20,20,40);
//        $pdf->Footer();
        $pdf->AddPage();
//
        $filename = 'Bill';
//
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I'); // This will output the PDF as a response directly

    }

    public function billPDFAction($id)
    {
        //        Recuperation des factures pour l'utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $bill = $em->getRepository('EcommerceEcommerceBundle:Commande')->findOneBy(
                                    array(
                                        'users' => $this->getUser(),
                                        'validate' => 1,
                                        'id' => $id )
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

        $html = $this->renderView(
            'UsersUsersBundle:Default/layout:billPDF.html.twig',
            array(
                'bill' => $bill
            )
        );

        $this->returnPDFResponseFromHTML($html, $id);

    }
}
