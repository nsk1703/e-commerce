<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Form\SearchType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
    public function listProductAction(Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->findBy(array('available' => 1));

        if ($session->has('basket')){
            $basket = $session->get('basket');
        }else{
            $basket = false;
        }

        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
            'products' => $products,
            'basket' => $basket
        ));
    }

    public function productInfoAction(Request $request, $id)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $product = $repository->find($id);

        if(!$product) throw $this->createNotFoundException('La page n\'existe pas');

        if ($session->has('basket')){
            $basket = $session->get('basket');
        }else{
            $basket = false;
        }

        return $this->render('@EcommerceEcommerce/Products/product_info.html.twig', array(
            'product' => $product,
            'basket' => $basket
        ));
    }

    public function categoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->byCategory($category);

        $repository1 = $em->getRepository('EcommerceEcommerceBundle:Categories');
        $category = $repository1->find($category);
        if(!$category) throw $this->createNotFoundException('La page n\'existe pas');

        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
                'products' => $products
        ));
    }

//    Creation du formulaire
    public function searchAction()
    {
        $form = $this->createForm(SearchType::class);
        return $this->render('@EcommerceEcommerce/Search/modulesUsed/search.html.twig', array(
                'form' => $form->createview()
        ));
    }

//    Fonctionnement du formulaire
//    Si le formulaire est rempli et la methode = POST,
// On applique doctrine et on appele la methode search() de notre repository qui prends en parametre
// la valeur entre dans le formulaire
    public function searchResultAction(Request $request)
    {
        $form = $this->createForm(SearchType::class);
        if ($form->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
            $products = $repository->search($form['search']->getData());
        }else{
            throw $this->createNotFoundException('Cette article n\'existe pas');
        }

        return $this->render('@EcommerceEcommerce/Products/list_product.html.twig', array(
                    'products' => $products
        ));
    }
}
