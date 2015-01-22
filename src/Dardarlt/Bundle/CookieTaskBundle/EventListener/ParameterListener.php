<?php

namespace Dardarlt\Bundle\CookieTaskBundle\EventListener;

use Dardarlt\Bundle\CookieTaskBundle\Factory\CookieFactory;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ParameterListener
{
    protected $cookieFactory;

    function __construct(CookieFactory $cookieFactory)
    {
        $this->cookieFactory = $cookieFactory;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request   = $event->getRequest();
        $response  = $event->getResponse();

        if ($parameterValue = $request->query->get('parameter')) {
            $response->headers->setCookie(
                $this->cookieFactory->createCookie($parameterValue, 'parameter')
            );
        }
    }
}
