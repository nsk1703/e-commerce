<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BasketController extends Controller
{
    public function addBasketAction()
    {
        return $this->render('@EcommerceEcommerce/Basket/add_basket.html.twig', array(
            // ...
        ));
    }

    public function deliverAction()
    {
        return $this->render('@EcommerceEcommerce/Basket/deliver.html.twig', array(
            // ...
        ));
    }

    public function validateAction()
    {
        return $this->render('@EcommerceEcommerce/Basket/validate.html.twig', array(
            // ...
        ));
    }

}
