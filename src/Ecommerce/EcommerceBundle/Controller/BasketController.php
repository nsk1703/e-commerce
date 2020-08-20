<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BasketController extends Controller
{
    public function addBasketAction(Request $request, $id)
    {
//        recuperation de notre session
        $session = $request->getSession();

//        Si la session a pour parametre 'basket', alors on l'a set et l'a recupere dans la variable $basket
        if(!$session->has('basket')) $session->set('basket', array());
            $basket = $session->get('basket');

//       $basket(ID OF PRODUCT) => QUANTITY
//
        if (array_key_exists($id, $basket)){
            if ($request->query->get('qty') != null)
                $basket[$id] = $request->query->get('qty');
            $session->getFlashBag()->add('success', 'quantity modified with success');
        }else{
            if ($request->query->get('qty') != null){
                $basket[$id] = $request->query->get('qty');
            }else{
                $basket[$id] = 1;
            }
            $session->getFlashBag()->add('success', 'product is adding with success');
        }

        $session->set('basket', $basket);


        return $this->redirect($this->generateUrl('basket'));
    }

    public function deleteBasketAction(Request $request, $id)
    {
        $session = $request->getSession();
        $basket = $session->get('basket');

        if (array_key_exists($id, $basket)){
            unset($basket[$id]);
            $session->set('basket', $basket);
            $session->getFlashBag()->add('success', 'product deleted with success');
        }

        return $this->redirect($this->generateUrl('basket'));
    }

    public function basketAction(Request $request)
    {
        $session = $request->getSession();
        if(!$session->has('basket')) $session->set('basket', array());

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EcommerceEcommerceBundle:Products');
        $products = $repository->findArray(array_keys($session->get('basket')));

        return $this->render('@EcommerceEcommerce/Basket/layout/basket.html.twig', array(
                    'products' => $products,
//                    Recuperation de la session basket
                    'basket' => $session->get('basket')
        ));
    }

    public function deliverAction()
    {
        return $this->render('@EcommerceEcommerce/Basket/layout/deliver.html.twig', array(
            // ...
        ));
    }

    public function validateAction()
    {
        return $this->render('@EcommerceEcommerce/Basket/layout/validate.html.twig', array(
            // ...
        ));
    }

    public function menuAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('basket'))
            $items = 0;
        else
            $items = count($session->get('basket'));

        return $this->render('@EcommerceEcommerce/Basket/modulesUsed/info_basket.html.twig', array(
                        'items' => $items
        ));
    }
}
