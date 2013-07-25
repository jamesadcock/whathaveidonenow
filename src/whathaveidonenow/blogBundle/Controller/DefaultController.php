<?php

namespace whathaveidonenow\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return new Response('<html><body> Blog Test!</body> </html>');
        //return $this->render('whathaveidonenowblogBundle:Default:index.html.twig', array('name' => $name));
    }
}
