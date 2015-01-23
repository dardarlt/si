<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $tweets = $this->get('tt.twitter_call')->getUserTweets('darbasonline', 10);
        return new JsonResponse($tweets);
    }
}
