<?php

namespace wcs\hackathonBundle\Controller;

use wcs\hackathonBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QuestionController extends Controller
{
    /**
     * @Route("/question/{catChoose}")
     */
    public function questionAction($catChoose)
    {
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository('wcshackathonBundle:Question')->findBy(array('category_id' => $catChoose));

        $rng = rand(0, count($question)-1);
        $selectedQuestion = $question[$rng];

        return $this->render('wcshackathonBundle:Default:questions.html.twig', array('question' => $selectedQuestion));
    }
}