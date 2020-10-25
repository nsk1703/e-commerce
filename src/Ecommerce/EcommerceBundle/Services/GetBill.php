<?php


namespace Ecommerce\EcommerceBundle\Services;


use Doctrine\Instantiator\Exception\ExceptionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Error\Error;

class GetBill
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var KernelInterface
     */
    private $kernel;

    public function __construct(ContainerInterface $container, KernelInterface $kernel)
    {
        $this->container = $container;
        $this->kernel = $kernel;
    }

    public function dateDirectory()
    {
         $date = new \DateTime();
         return $date->format('d-m-Y h-i-s');

    }

    public function makeDateDirectory()
    {
        $filesystem = new Filesystem();
//        $projectDir = $this->kernel->getProjectDir();
        $dir = $this->dateDirectory();
        $filesystem->mkdir('Billing/'.$dir);
    }

    public function returnPDFResponseFromHTML($bill)
    {
//        set_time_limit(30); uncomment this line according to your needs
//        If you are not in a controller, retrieve of some way the service container and then retrieve it
        $pdf = $this->container->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//       if you are in a controlller use :
//        $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetAuthor('HitechElectronics');
        $pdf->SetTitle(('Bill_'.$bill->getUsers()));
        $pdf->SetSubject('Bill to Paid');
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', 'css', 11, '', true);
//        $pdf->SetMargins(20, 20,20,40);
        $pdf->Footer();
        $pdf->AddPage();

        $html = $this->container->get('templating')->render('UsersUsersBundle:Default/layout:billPDF.html.twig',
            array(
                'bill' => $bill
            )
        );
//        $dir = $this->dateDirectory();
//        $this->makeDateDirectory();
//        $projectDir = $this->kernel->getProjectDir();

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($this->kernel->getProjectDir()."/Billing/".$this->dateDirectory()."/Bill".$bill->getReference().".pdf",'F'); // This will output the PDF as a response directly

    }



}