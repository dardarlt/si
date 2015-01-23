<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultControllerTest extends WebTestCase
{
    public function testServiceIsWorking()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task2/tweets/justin_bieber');

        $this->assertTrue($crawler->filter('html:contains("Tweets")')->count() > 0);
    }

    public function testServiceNotFound()
    {
        $client = static::createClient();
        $client->request('GET', '/task2/tweets/random_user_not');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
