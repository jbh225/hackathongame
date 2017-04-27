<?php

namespace wcs\hackathonBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use wcs\hackathonBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use wcs\hackathonBundle\Entity\Reponse;

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

    /**
     * @Route("/respond/{myQuestion}/{answer}")
     */
    public function respondAction($myQuestion , Reponse $answer)
    {
        var_dump($answer->getAnswer());die();

        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $getQuestion = $em->getRepository('wcshackathonBundle:Reponse')->findOneBy(array('question_id' => $myQuestion));

        return $this->render('wcshackathonBundle:Default:score.html.twig', array('question' => $selectedQuestion));
    }
}