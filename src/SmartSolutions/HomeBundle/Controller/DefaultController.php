<?php

namespace SmartSolutions\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SmartSolutionsHomeBundle:Default:index.html.twig');
    }
}
