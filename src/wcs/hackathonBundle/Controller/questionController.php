<?php
/**
 * Created by PhpStorm.
 * User: jean-baptiste
 * Date: 27/04/17
 * Time: 16:57
 */

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use wcs\hackathonBundle\Entity\Question;

class questionController extends Controller
{
    /**
     * @Route("/showquestion/{id}")
     */
    public function showQuestionAction(Question $question)
    {
        dump($question);
//        $em = $this->getDoctrine()->getManager();
//        $question = $em->getRepository('wcshackathonBundle:Question')
//            ->find($id);
        return $this->render('wcshackathonBundle:Default:questions.html.twig',array('question'=>$question));
    }
}