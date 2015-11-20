<?php

namespace SmartSolutions\ContadorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$name = "asa";
        return $this->render('SmartSolutionsContadorBundle:Default:index.html.twig', array('name' => $name));
    }
}
