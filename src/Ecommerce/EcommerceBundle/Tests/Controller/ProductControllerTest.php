<?php

namespace Ecommerce\EcommerceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testListproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listProduct');
    }

    public function testProductinfo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/productInfo');
    }

}
