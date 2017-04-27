<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        session_unset();
        return $this->render('wcshackathonBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register")
     */

    public function registerAction()
    {
        $username= $_POST['username'];
        $SESSION['username']= $username;
        return $this->redirect('/category', 301);
    }
}
