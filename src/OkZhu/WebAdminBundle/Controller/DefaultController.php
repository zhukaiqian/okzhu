<?php

namespace OkZhu\WebAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use OkZhu\WebAdminBundle\Entity\User;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OkZhuWebAdminBundle:Default:index.html.twig');
    }
}
