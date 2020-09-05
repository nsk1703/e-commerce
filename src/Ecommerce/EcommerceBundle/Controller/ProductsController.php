<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Categories;
use Ecommerce\EcommerceBundle\Form\SearchType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
    public function listProductAction(Request $request, Categories $category = null)
    {
//        Initialisation de la variable SESSION et de l'entityManager
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');

//        Selection des produits par categories de produits et selon la disponibilite du produit
//        Si la categorie n'est pas null, alors on recupere les produits par categories
//        sinon par disponibilite
        if ($category != null)
            $list_products = $repository->byCategory($category);
        else
            $list_products = $repository->findBy(array('available' => 1));

        $products = $this->get('knp_paginator')->paginate($list_products,
            $request->query->get('page', 1) /*Le numero de la page a aficher*/, 7 /*le nombre d' elements par page*/);

//        Recuperation de la variable session[basket]
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
//        Initialisation de la variable SESSION et de l'entityManeger
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

//        Recuperation des informations d'un produit
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $product = $repository->find($id);

//        Si le produit n'existe pas alors la pages d'unformations n'existera pas
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
