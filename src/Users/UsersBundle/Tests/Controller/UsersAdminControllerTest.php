<?php

namespace Users\UsersBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersAdminControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testAddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/address');
    }

}
