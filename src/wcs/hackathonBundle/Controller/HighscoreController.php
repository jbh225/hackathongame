<?php

namespace wcs\hackathonBundle\Controller;

use wcs\hackathonBundle\Entity\Highscore;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Highscore controller.
 *
 * @Route("highscore")
 */
class HighscoreController extends Controller
{
    /**
     * Lists all highscore entities.
     *
     * @Route("/", name="highscore_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $highscores = $em->getRepository('wcshackathonBundle:Highscore')->findAll();

        return $this->render('highscore/index.html.twig', array(
            'highscores' => $highscores,
        ));
    }

    /**
     * Creates a new highscore entity.
     *
     * @Route("/new", name="highscore_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $highscore = new Highscore();
        $form = $this->createForm('wcs\hackathonBundle\Form\HighscoreType', $highscore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($highscore);
            $em->flush();

            return $this->redirectToRoute('highscore_show', array('id' => $highscore->getId()));
        }

        return $this->render('highscore/new.html.twig', array(
            'highscore' => $highscore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a highscore entity.
     *
     * @Route("/{id}", name="highscore_show")
     * @Method("GET")
     */
    public function showAction(Highscore $highscore)
    {
        $deleteForm = $this->createDeleteForm($highscore);

        return $this->render('highscore/show.html.twig', array(
            'highscore' => $highscore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing highscore entity.
     *
     * @Route("/{id}/edit", name="highscore_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Highscore $highscore)
    {
        $deleteForm = $this->createDeleteForm($highscore);
        $editForm = $this->createForm('wcs\hackathonBundle\Form\HighscoreType', $highscore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('highscore_edit', array('id' => $highscore->getId()));
        }

        return $this->render('highscore/edit.html.twig', array(
            'highscore' => $highscore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a highscore entity.
     *
     * @Route("/{id}", name="highscore_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Highscore $highscore)
    {
        $form = $this->createDeleteForm($highscore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($highscore);
            $em->flush();
        }

        return $this->redirectToRoute('highscore_index');
    }

    /**
     * Creates a form to delete a highscore entity.
     *
     * @param Highscore $highscore The highscore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Highscore $highscore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('highscore_delete', array('id' => $highscore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
