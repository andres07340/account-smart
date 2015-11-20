<?php

namespace SmartSolutions\GerenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$name = "Hola";
        return $this->render('SmartSolutionsGerenteBundle:Default:index.html.twig', array('name' => $name));
    }
}
