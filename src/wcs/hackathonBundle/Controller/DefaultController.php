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
        return $this->render('wcshackathonBundle:Default:connexion.html.twig');
    }

    /**
     * @Route("/register")
     */
    public function registerAction()
    {
        session_unset();
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        return header('Location : /category');
    }
}
