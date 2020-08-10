<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\EcommerceEcommerceBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategoriesController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Categories');
        $categories = $repository->findAll();

        return $this->render('@EcommerceEcommerce/Categories/modulesUsed/menu.html.twig',
                array('categories' => $categories)
        );
    }
}