<?php
/**
 * Created by PhpStorm.
 * User: malik
 * Date: 28/04/17
 * Time: 02:03
 */

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
        $session->set('username', $username);
        return $this->redirect('/playcategory', 301);
    }
}