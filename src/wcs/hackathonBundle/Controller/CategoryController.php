<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category")
     */
    public function categoryAction()
    {
        return $this->render('wcshackathonBundle:Default:category.html.twig');
    }
}