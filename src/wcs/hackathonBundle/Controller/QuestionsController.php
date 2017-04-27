<?php

namespace wcs\hackathonBundle\Controller;


use wcs\hackathonBundle\Entity\Question;
use Symfony\Bridge\Doctrine\Tests\Fixtures\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QuestionsController extends Controller
{
    /**
     * @Route("/question/{id}")
     */
    public function questionAction(Question $id)
    {
        $em = $this->getDoctrine()->getManager();
//         select * from question where id=$id
         $question = $em->getRepository('wcshackathonBundle:Question')->find($id);


        return $this->render('wcshackathonBundle:Default:questions.html.twig',['question' => $question]);
    }
}