<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function listProductAction()
    {
        return $this->render('@EcommerceEcommerce/Product/list_product.html.twig', array(
            // ...
        ));
    }

    public function productInfoAction()
    {
        return $this->render('@EcommerceEcommerce/Product/product_info.html.twig', array(
            // ...
        ));
    }

}
