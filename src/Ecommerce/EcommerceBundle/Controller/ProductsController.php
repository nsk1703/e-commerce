<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function listProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->findAll();
        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
            'products' => $products
        ));
    }

    public function productInfoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $product = $repository->find($id);
        return $this->render('@EcommerceEcommerce/Products/product_info.html.twig', array(
            'product' => $product
        ));
    }

    public function categoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->byCategory($category);

        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
                'products' => $products
        ));
    }

}
