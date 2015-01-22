<?php

namespace Dardarlt\Bundle\CookieTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('DardarltCookieTaskBundle:Default:index.html.twig', array('name' => $name));
    }
}
