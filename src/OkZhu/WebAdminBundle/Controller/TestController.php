<?php

namespace OkZhu\WebAdminBundle\Controller;


use OkZhu\WebAdminBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use OkZhu\WebAdminBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

public function listAction()
    {
	

        return $this->render('OkZhuWebAdminBundle:Default:list.html.twig');
    }
	
	public function createAction()
	{
		$user = new User();
		$user->setName('A Foo Bar');
		$user->setPrice('19.99');
		$user->setDescription('Lorem ipsum dolor');

		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();

		return new Response('Created product id '.$user->getId());
	}
	
	public function showAction()
	{
		// $user = $this->getDoctrine()
			// ->getRepository('OkZhuWebAdminBundle:User')
			// ->find(1);
			
			
			
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQuery(
				'SELECT u
				FROM OkZhuWebAdminBundle:User u
				WHERE u.id > :id
				ORDER BY u.price ASC'
			)->setParameter('id', '1');

			$user = $query->getResult();

		if (!$user) {
			throw $this->createNotFoundException(
				'No user found for id 1'
			);
			// return new Response('No user found for id '.$id);
		}

		print_r($user);
		return new Response('find product id '.$user[0]->getId());
		
		// return new Response('find product id '.$user->getId());
		
	}
	
	
	public function updateAction()
	{

		$id = 1;
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('OkZhuWebAdminBundle:User')->find($id);

		if (!$user) {
			throw $this->createNotFoundException(
				'No user found for id '.$id
			);
		}

		$user->setName('New product name!');
		$em->flush();

		return $this->redirect($this->generateUrl('ok_zhu_web_admin_showpage'));
	}
	
	
	public function cacheAction()
	{
		$request = $this->get('request');
		$response1 = new Response('sdadssassdsadasdasd');
		$response =  $this->render('OkZhuWebAdminBundle:Default:cache.html.twig');
		$response->setPublic();
		// $response->setPrivate();
		// set the private or shared max age
		$response->setMaxAge(600);
		// $response->setSharedMaxAge(600);
		
		// $date = new \DateTime();
		// $date->modify('-60 seconds');
		
		$lastModified = $request->headers->get('If-Modified-Since');
		$response->setLastModified($lastModified);
		// $date->modify('+600 seconds');
		// $response->setExpires($date);
		
		$response->setETag(md5($response->getContent()));
	
		 if ($response->isNotModified($this->getRequest())) {
			return $response;
		}
		
		// $response->setContent("Modified");
		
		return $response;
	}
	
	public function sharedAction($max)
	{
		$response = new Response('ShareddsAcsssfsdfstison  SharedAction  SharedAction<br />');
		$response->setSharedMaxAge(6000);
		 if ($response->isNotModified($this->getRequest())) {
			return $response;
		}
		
		return $response;
	}
	
	
	public function testFromnAction()
    {
	
		$request = $this->get('request');
		$user = new User();
		$user->setName('ssssssss');
			$user->setDescription("111");

		$form = $this->createFormBuilder($user)
			 ->add('name','text')
			 ->add('description','number')
			 ->getForm();
		
		 if($request->getMethod() == "POST"){
		 
              $form->bind($request);
			// $user = $form->getData();
			// $em = $this->getDoctrine()->getEntityManager();
			// $em->persist($user);
			// $em->flush();
	
	

              if($form->isValid()){
					return new Response("tast success");
              }
        }else{
		
			
		}
		
		$pram = array(
				 'form' =>$form->createView()
			);
				
		 return $this->render('OkZhuWebAdminBundle:Default:testfrom.html.twig',$pram);
		
    }
	
	public function testFromnDoAction()
    {
		return new Response("tast errr");
    }
	
	public function logOutAction()
    {
    }
	/*
	文本字段：
		text
		textarea
		email
		integer
		money
		number
		password
		percent
		search
		url

	选择字段：
		choice
		entity
		country
		language
		locale
		timezone

	日期和时间字段：
		date
		datetime
		time
		birthday


	其它字段：
		checkbox
		file
		radio


	字段组：
		collection
		repeated

	隐藏字段：
		hidden
		csrf

	基础字段：
		field
		form
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	
	?>