<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function ajoutAction()
    {
//        $product = new Products();
        $entityManager = $this->getDoctrine()->getManager();

//        $product->setName('hp-pavillon-g6');
//        $product->setPrice('238.461');
//        $product->setCategory('Informatiques');
//        $product->setDescription('Ordinnateur hp pavillon g6, seconde classe: 500Giga, 4Ram, 2.60Ghz');
//        $product->setAvailable('1');
//        $product->setImage('https://img.bfmtv.com/c/1256/708/63a/d9b4e8cfb2ef487a6429d3389c1a1.jpg');
//        $product->setTva('19.5');
//
//        $entityManager->persist($product);
//        $entityManager->flush();

//        $product->setName('Acer Aspire');
//        $product->setPrice('276.923');
//        $product->setCategory('Informatiques');
//        $product->setDescription('Ordinnateur Acer Aspire-NoteBook, Neuf: 1Tera, 6Ram, 3Ghz');
//        $product->setAvailable('1');
//        $product->setImage('https://static.acer.com/up/Resource/Acer/Laptops/Aspire_7/images/20191225/Aspire-7-A715-75G-41G-Black-modelmain.png');
//        $product->setTva('19.5');
//
//        $entityManager->persist($product);
//        $entityManager->flush();

        $products = $entityManager->getRepository('EcommerceEcommerceBundle:Products')->findAll();
//        var_dump($products);
//        die();
        return $this->render('@EcommerceEcommerce/Default/test.html.twig', array(
                    'products' => $products
        ));
    }
}
