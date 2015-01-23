<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $data = $this->get('tt.twitter_provider')->getStatuses();
        return new JsonResponse($data);
    }
}
