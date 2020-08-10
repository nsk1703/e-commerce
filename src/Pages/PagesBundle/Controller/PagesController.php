<?php

namespace Pages\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('PagesPagesBundle:Pages');
        $pages = $repository->findAll();

        return $this->render('@PagesPages/pages/modulesUsed/menu.html.twig', array(
            'pages' => $pages
        ));
    }

    public function pagesAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('PagesPagesBundle:Pages');
        $page = $repository->find($id);
<<<<<<< HEAD
=======

        if(!$page) throw $this->createNotFoundException('La page n\'existe pas');

>>>>>>> Site dynamique
        return $this->render('@PagesPages/pages/layout/pages.html.twig', array(
            'page' => $page
        ));
    }
}
