<?php


namespace Ecommerce\EcommerceBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SendMailer
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container, \Swift_Mailer $mailer)
    {
        $this->container = $container;
        $this->mailer = $mailer;
    }

    public function sendMail($commande)
    {
        //Envoi du mail de validation
        $message = (new \Swift_Message('Validation de votre Commande'))
            ->setFrom(array('hitechmarket@gmail.com' => 'HitechElectronics'))
            ->setTo($commande->getUsers()->getEmailCanonical())
            ->setBody(
                $this->container->get('templating')->render('SwiftLayout/validationCommande.html.twig', 
                        array('user' => $commande->getUsers())
            ), 
            'text/html'
        );

        $this->mailer->send($message);
    }

}