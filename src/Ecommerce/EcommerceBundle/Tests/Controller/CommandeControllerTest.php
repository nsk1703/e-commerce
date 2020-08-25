<?php

namespace Ecommerce\EcommerceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandeControllerTest extends WebTestCase
{
    public function testPrepare()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/prepare');
    }

}
