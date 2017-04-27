<?php
/**
 * Created by PhpStorm.
 * User: jean-baptiste
 * Date: 27/04/17
 * Time: 17:13
 */

namespace wcs\hackathonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class reponseController extends Controller
{
    /**
     * @Route("/showreponse/{id}")
     */
    public function showReponseAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $reponse = $em->getRepository('wcshackathonBundle:Reponse')
            ->find($id);
        return $this->render('wcshackathonBundle:Default:reponse.html.twig',array('reponse'=>$reponse));
    }
}