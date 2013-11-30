<?php

namespace OkZhu\WebAdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use OkZhu\WebAdminBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;



class LoginController extends Controller
{
	
	public function loginAction()
    {
		$request = $this->get('request');
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
		    $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
			$request->getSession()->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
		
		
		$test = $this->get('ok_zhu_web_admin.test');
		$test = $test->sssss();

		$param = array(
					'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
					'error'         => $error,
					'test'         => $test
				);
		
        return $this->render('OkZhuWebAdminBundle:Default:login.html.twig',$param);
    }
	
	public function loginCheckAction()
    {
    }
	
	public function logOutAction()
    {
    }
	
}
