<?php


namespace Ecommerce\EcommerceBundle\Services;


use Symfony\Component\DependencyInjection\ContainerInterface;

class SendMailer
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function sendMail($commande)
    {
        //Envoi du mail de validation
        $message = \Swift_Message::newInstance()
            ->setSubject('Validation de votre Commande')
            ->setFrom(array('hitechmarket@gmail.com' => 'HitechElectronics'))
            ->setTo($commande->getUsers()->getEmailCanonical())
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->renderView('EcommerceEcommerceBundle:SwiftLayout:validationCommande.html.twig', array(
                'user' => $commande->getUsers()
            ))
        );

        $this->get('mailer')->send($message);
    }
}