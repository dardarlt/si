<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DardarltTwitterTaskBundle:Default:index.html.twig', array('name' => $name));
    }
}
