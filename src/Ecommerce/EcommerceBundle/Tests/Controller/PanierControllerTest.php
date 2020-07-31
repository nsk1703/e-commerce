<?php

namespace Ecommerce\EcommerceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PanierControllerTest extends WebTestCase
{
    public function testAddbasket()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addBasket');
    }

    public function testDeliver()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deliver');
    }

    public function testValidate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/validate');
    }

}
