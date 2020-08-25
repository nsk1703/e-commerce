<?php


namespace Ecommerce\EcommerceBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;


class RedirectionListener
{

    /**
     * @var Session
     */
    private $session;

    /**
     * @var object|\Symfony\Bundle\FrameworkBundle\Routing\Router|null
     */
    private $router;

    /**
     * @var object|null
     */
    private $token;

    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->token = $container->get('security.token_storage');
    }

//    Ecouteur "GetResponseEvent" pour recuperer la route appele dans l'url
    public function onKernelRequest(GetResponseEvent $event)
    {
//          Recuperation de la route en cours dans la zone d'url
        $route = $event->getRequest()->attributes->get('_route');

//        Si la route a pour valeur 'deliver' ou 'validate' alors...
        if ($route == 'deliver' || $route == 'validate') {

//            Si la variable session basket existe
            if ($this->session->has('basket'))
            {
//                Si il n'y a aucun produit dans la session basket, alors on force la route en le redirigeant a la route basket
                if (count($this->session->get('basket')) == 0)
                    $event->setResponse(new RedirectResponse($this->router->generate('basket')));
            }

//            On verifie qu'au moins l'utilisateur est connecte, sinon on le redirige vers la page de connexion
//            avec un messsage flashBag. Et alors il accedera a la page livraison pour valider son achat
            if (!is_object($this->token->getToken()->getUser())) {
                $this->session->getFlashBag()->add('warning', 'Identification is necessary');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}