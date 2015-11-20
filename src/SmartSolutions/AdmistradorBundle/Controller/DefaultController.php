<?php

namespace SmartSolutions\AdmistradorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SmartSolutions\AdmistradorBundle\Clientes;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SmartSolutionsAdmistradorBundle:Default:home.html.twig');
    }

    public function loginAction(Request $request)
	{
	    $authenticationUtils = $this->get('security.authentication_utils');

	    // get the login error if there is one
	    $error = $authenticationUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authenticationUtils->getLastUsername();

	    return $this->render(
	        'SmartSolutionsAdmistradorBundle:Default:index.html.twig',
	        array(
	            // last username entered by the user
	            'last_username' => $lastUsername,
	            'error'         => $error,
	        )
	    );
	}

	public function loginCheckAction()
    {
    	$user = $this->get('security.context')->getToken()->getUser();;

        if(!$user->getIsActive()){
            return $this->redirect($this->generateUrl('logout'));
        }
    	if($user->getRoles() == array('role_contador')){
    		return $this->redirect($this->generateUrl('smart_solutions_contador_homepage'));
    	}elseif ($user->getRoles() == array('role_gerente')){
    		return $this->redirect($this->generateUrl('smart_solutions_gerente_homepage'));
    	}elseif ($user->getRoles() == array('role_vendedor')){
    		return $this->redirect($this->generateUrl('smart_solutions_vendedor_homepage'));
    	}elseif ($user->getRoles() == array('role_admin')){
    		return $this->redirect($this->generateUrl('smart_solutions_admistrador_homepage'));
    	}
    }
}
