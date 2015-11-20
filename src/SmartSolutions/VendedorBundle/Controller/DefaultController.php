<?php

namespace SmartSolutions\VendedorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$name = "asd";
        return $this->render('SmartSolutionsVendedorBundle:Default:index.html.twig', array('name' => $name));
    }
}
