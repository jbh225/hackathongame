<?php
/**
 * Created by PhpStorm.
 * User: malik
 * Date: 28/04/17
 * Time: 10:13
 */

namespace wcs\hackathonBundle\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use wcs\hackathonBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class PlayController extends Controller
{
    /**
     * @Route("/playcategory")
     */
    public function publicAction()
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('wcshackathonBundle:Category')->findAll();

        return $this->render('wcshackathonBundle:Default:playcategory.html.twig',
            array(
                'categories' => $categories,
                'user' => $session->get('username'),
            ));
    }

}