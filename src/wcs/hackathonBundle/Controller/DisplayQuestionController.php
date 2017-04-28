<?php
/**
 * Created by PhpStorm.
 * User: malik
 * Date: 28/04/17
 * Time: 10:34
 */

namespace wcs\hackathonBundle\Controller;
use Symfony\Component\HttpFoundation\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DisplayQuestionController extends Controller
{
    /**
     * @Route("/display/{id}")
     */
    public function publicAction($id)
    {
        $session = new Session\Session();
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository('wcshackathonBundle:Question')->find($id);

        return $this->render('wcshackathonBundle:Default:display.html.twig',
            array(
                'question' => $question,
                'user' => $session->get('username'),
            ));
    }
}