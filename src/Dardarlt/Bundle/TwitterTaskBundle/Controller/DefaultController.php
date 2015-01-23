<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function tweetsAction($person)
    {
        $personService = sprintf('tt.twitter.%s', $person );

        if ($this->has($personService)) {
            $tweets = $this->get($personService);
            return $this->render('DardarltTwitterTaskBundle:Default:tweets.html.twig', array('tweets' => $tweets));
        }

        throw $this->createNotFoundException('This account is not implemented');
    }
}
