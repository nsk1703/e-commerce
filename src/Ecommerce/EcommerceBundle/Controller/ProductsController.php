<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function listProductAction()
    {
        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
            // ...
        ));
    }

    public function productInfoAction()
    {
        return $this->render('@EcommerceEcommerce/Products/product_info.html.twig', array(
            // ...
        ));
    }

}
