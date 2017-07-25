<?php

namespace AppBundle\Controller;

use AppBundle\Entity\dodo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dodo controller.
 *
 * @Route("dodo")
 */
class dodoController extends Controller
{
    /**
     * Lists all dodo entities.
     *
     * @Route("/", name="dodo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dodos = $em->getRepository('AppBundle:dodo')->findAll();

        return $this->render('dodo/index.html.twig', array(
            'dodos' => $dodos,
        ));
    }

    /**
     * Creates a new dodo entity.
     *
     * @Route("/new", name="dodo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dodo = new Dodo();
        $form = $this->createForm('AppBundle\Form\dodoType', $dodo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dodo);
            $em->flush();

            return $this->redirectToRoute('dodo_index');
        }

        return $this->render('dodo/new.html.twig', array(
            'dodo' => $dodo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dodo entity.
     *
     * @Route("/{id}", name="dodo_show")
     * @Method("GET")
     */
    public function showAction(dodo $dodo)
    {
        $deleteForm = $this->createDeleteForm($dodo);

        return $this->render('dodo/show.html.twig', array(
            'dodo' => $dodo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dodo entity.
     *
     * @Route("/{id}/edit", name="dodo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, dodo $dodo)
    {
        $deleteForm = $this->createDeleteForm($dodo);
        $editForm = $this->createForm('AppBundle\Form\dodoType', $dodo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dodo_index');
        }

        return $this->render('dodo/edit.html.twig', array(
            'dodo' => $dodo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dodo entity.
     *
     * @Route("/{id}", name="dodo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, dodo $dodo)
    {
        $form = $this->createDeleteForm($dodo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dodo);
            $em->flush();
        }

        return $this->redirectToRoute('dodo_index');
    }

    /**
     * Creates a form to delete a dodo entity.
     *
     * @param dodo $dodo The dodo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(dodo $dodo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dodo_delete', array('id' => $dodo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
