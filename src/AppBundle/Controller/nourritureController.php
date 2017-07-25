<?php

namespace AppBundle\Controller;

use AppBundle\Entity\nourriture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Nourriture controller.
 *
 * @Route("nourriture")
 */
class nourritureController extends Controller
{
    /**
     * Lists all nourriture entities.
     *
     * @Route("/", name="nourriture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nourritures = $em->getRepository('AppBundle:nourriture')->findAll();

        return $this->render('nourriture/index.html.twig', array(
            'nourritures' => $nourritures,
        ));
    }

    /**
     * Creates a new nourriture entity.
     *
     * @Route("/new", name="nourriture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nourriture = new Nourriture();
        $form = $this->createForm('AppBundle\Form\nourritureType', $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nourriture);
            $em->flush();

            return $this->redirectToRoute('nourriture_index');
        }

        return $this->render('nourriture/new.html.twig', array(
            'nourriture' => $nourriture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nourriture entity.
     *
     * @Route("/{id}", name="nourriture_show")
     * @Method("GET")
     */
    public function showAction(nourriture $nourriture)
    {
        $deleteForm = $this->createDeleteForm($nourriture);

        return $this->render('nourriture/show.html.twig', array(
            'nourriture' => $nourriture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nourriture entity.
     *
     * @Route("/{id}/edit", name="nourriture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, nourriture $nourriture)
    {
        $deleteForm = $this->createDeleteForm($nourriture);
        $editForm = $this->createForm('AppBundle\Form\nourritureType', $nourriture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('nourriture_index');

        }

        return $this->render('nourriture/edit.html.twig', array(
            'nourriture' => $nourriture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nourriture entity.
     *
     * @Route("/{id}", name="nourriture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, nourriture $nourriture)
    {
        $form = $this->createDeleteForm($nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nourriture);
            $em->flush();
        }

        return $this->redirectToRoute('nourriture_index');
    }

    /**
     * Creates a form to delete a nourriture entity.
     *
     * @param nourriture $nourriture The nourriture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(nourriture $nourriture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nourriture_delete', array('id' => $nourriture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
