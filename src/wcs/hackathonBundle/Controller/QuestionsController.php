<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class QuestionsController extends Controller
{
    /**
     * @Route("/questions")
     */
    public function indexAction()
    {
        return $this->render('wcshackathonBundle:Default:questions.html.twig');
    }
}