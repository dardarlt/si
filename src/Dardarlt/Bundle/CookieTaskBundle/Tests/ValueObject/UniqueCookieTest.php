<?php


use Dardarlt\Bundle\CookieTaskBundle\ValueObject\UniqueCookie;
use Symfony\Bundle\SecurityBundle\Tests\Functional\WebTestCase;

class UniqueCookieTest extends WebTestCase
{
    public function testValue()
    {
        $name = 'test';
        $cookie = new UniqueCookie($name);
        $this->assertEquals($name, $cookie->getValue());
    }

    public function testName()
    {
        $name = 'test';
        $cookie = new UniqueCookie($name);
        $this->assertEquals(md5($name), $cookie->getName());
    }

    public function testHasPrefix()
    {
        $name = 'test';
        $prefix = 'prefix';
        $cookie = new UniqueCookie($name);
        $cookie->setPrefix($prefix);

        $this->assertTrue(strpos($cookie->getName(), $prefix) !== false);
    }
}
