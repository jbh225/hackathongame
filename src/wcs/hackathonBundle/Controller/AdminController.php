<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {

        return $this->render('wcshackathonBundle:admin:admin.html.twig');
    }
}