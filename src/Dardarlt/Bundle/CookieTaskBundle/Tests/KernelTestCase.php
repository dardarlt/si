<?php

namespace Dardarlt\Bundle\CookieTaskBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase ;

abstract class KernelTestCase extends WebTestCase
{
    protected static $client;
    protected static $application;
    protected $container;

    public function setUp()
    {
        $config = array('environment' => 'test', 'debug' => true);

        self::$kernel = self::createKernel($config);
        self::$kernel->boot();

        $this->container = self::$kernel->getContainer();
    }

    /**
     * Ensure kernel has been shutdown
     */
    public function tearDown()
    {
        if (self::$kernel === null) {
            return;
        }

        self::$kernel->shutdown();
    }

    public function getKernel()
    {
        return self::$kernel;
    }
}