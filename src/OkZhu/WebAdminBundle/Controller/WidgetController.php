<?php

namespace OkZhu\WebAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use OkZhu\WebAdminBundle\Entity\User;

use Symfony\Component\HttpFoundation\Response;

use Doctrine\Common\Cache\PhpFileCache;

class WidgetController extends Controller
{

	public function navBarWidgetAction()
    {
		// $user = $this->getUser();
		// $param =array("user"=>$user);
	// var_dump($user);
        // return $this->render('OkZhuWebAdminBundle:widget:navbar_widget.html.twig',$param);
		return $this->render('OkZhuWebAdminBundle:widget:navbar_widget.html.twig');
    }
	
	public function sideBarWidgetAction($routeName)
    {
		// $cache_key= "test_key";
	
	
		// $cache = $this->get('cache');
		// $cache->setNamespace('mynamespace.cache'); 
		// if (false === ($cached_data = $cache->fetch($cache_key))) {
		
		// var_dump("##############");
					// $cached_data = "cached_data";
					// $cache->save($cache_key, $cached_data, 3600);//TTL 1h
		// }

		// $securityContext=$this->get('security.context');
		// $token = $securityContext->getToken();
		// $user = $this->getUser();
		// if (empty($user)) {
				// return new Response();
			// }
			
		// $request = $this->container->get('request');
		// $routeName = $request->get('_route');

// var_dump($request);

	$param = array(
					'routeName' =>$routeName 
				);

        return $this->render('OkZhuWebAdminBundle:widget:sidebar_widget.html.twig',$param);
    }

	
}
