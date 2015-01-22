<?php

namespace Dardarlt\Bundle\CookieTaskBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/task1/hello/Fabien');
        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }

    public function testCookieIsNotGenerated()
    {
        $client = static::createClient();
        $client->request('GET', '/task1/hello/Fabien');

        $headers = $client->getInternalResponse()->getHeaders();
        $this->assertTrue(empty($headers['Set-Cookie']));
    }

    public function testCookieIsGenerated()
    {
        $client = static::createClient();
        $client->request('GET', '/task1/hello/Fabien?parameter=test');

        $headers = $client->getInternalResponse()->getHeaders();
        $cookies = $headers['Set-Cookie'];
        $this->assertNotEmpty($cookies);
    }
}
