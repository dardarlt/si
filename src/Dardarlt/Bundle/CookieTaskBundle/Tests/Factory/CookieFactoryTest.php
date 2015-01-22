<?php


use Dardarlt\Bundle\CookieTaskBundle\Factory\CookieFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Cookie;

class CookieFactoryTest extends WebTestCase
{
    public function testCreatedCookieIsObject()
    {
        $factory = new CookieFactory();
        \PHPUnit_Framework_Assert::assertTrue($factory->createCookie('test') instanceof Cookie);
    }
}
