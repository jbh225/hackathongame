<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('wcshackathonBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register")
     */
    public function registerAction()
    {
        $username = $_POST['username'];

        $session = new Session();
        $session->set('username',$username);

        return $this->redirect('/category', 301);
    }
}
