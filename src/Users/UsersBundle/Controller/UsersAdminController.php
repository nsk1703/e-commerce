<?php

namespace Users\UsersBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersAdminController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UsersUsersBundle:Users')->findAll();
        return $this->render('@UsersUsers/Users/index.html.twig', array(
            'users' => $users
        ));
    }

    public function userInfoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UsersUsersBundle:Users')->find($id);
        $route = $this->container->get('request_stack')->getCurrentRequest()->get('_route');
//        dump($route);
//        die();
        if ( $route == 'adminUsers_address')
            return $this->render('@UsersUsers/Users/address.html.twig', array('user' => $user));
        elseif ($route == 'adminUsers_bills')
            return $this->render('@UsersUsers/Users/bill.html.twig', array('user' => $user));
        else
            throw $this->createNotFoundException('La vue n\'existe pas.');


    }

}
