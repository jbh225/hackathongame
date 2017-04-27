<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class CategoryController extends Controller
{
    /**
     * @Route("/category")
     */
    public function indexAction()
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('wcshackathonBundle:Category')->findAll();

        return $this->render('wcshackathonBundle:Default:category.html.twig',
            array(
                'categories' => $category,
                'user' => $session->get('username'),
                ));
    }
}