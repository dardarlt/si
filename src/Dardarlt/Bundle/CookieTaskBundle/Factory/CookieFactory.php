<?php

namespace Dardarlt\Bundle\CookieTaskBundle\Factory;

use Dardarlt\Bundle\CookieTaskBundle\ValueObject\UniqueCookie;
use Symfony\Component\HttpFoundation\Cookie;

class CookieFactory
{
    protected $name;

    protected $value;

    public function createCookie($value, $prefix = null)
    {
        $uniqueCookie = new UniqueCookie($value);
        if (!empty($prefix)) {
            $uniqueCookie->setPrefix($prefix);
        }

        return new Cookie(
            $uniqueCookie->getName(),
            $uniqueCookie->getValue(),
            time() + $uniqueCookie->getLifetime()
        );
    }
}
