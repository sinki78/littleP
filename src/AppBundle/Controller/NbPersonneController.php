<?php

namespace AppBundle\Controller;

use AppBundle\Entity\NbPersonne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Nbpersonne controller.
 *
 * @Route("nbpersonne")
 */
class NbPersonneController extends Controller
{
    /**
     * Lists all nbPersonne entities.
     *
     * @Route("/", name="nbpersonne_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nbPersonnes = $em->getRepository('AppBundle:NbPersonne')->findAll();

        return $this->render('nbpersonne/index.html.twig', array(
            'nbPersonnes' => $nbPersonnes,
        ));
    }

    /**
     * Creates a new nbPersonne entity.
     *
     * @Route("/new", name="nbpersonne_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nbPersonne = new Nbpersonne();
        $form = $this->createForm('AppBundle\Form\NbPersonneType', $nbPersonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nbPersonne);
            $em->flush();

            return $this->redirectToRoute('nbpersonne_index');
        }

        return $this->render('nbpersonne/new.html.twig', array(
            'nbPersonne' => $nbPersonne,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nbPersonne entity.
     *
     * @Route("/{id}", name="nbpersonne_show")
     * @Method("GET")
     */
    public function showAction(NbPersonne $nbPersonne)
    {
        $deleteForm = $this->createDeleteForm($nbPersonne);

        return $this->render('nbpersonne/show.html.twig', array(
            'nbPersonne' => $nbPersonne,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nbPersonne entity.
     *
     * @Route("/{id}/edit", name="nbpersonne_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NbPersonne $nbPersonne)
    {
        $deleteForm = $this->createDeleteForm($nbPersonne);
        $editForm = $this->createForm('AppBundle\Form\NbPersonneType', $nbPersonne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('nbpersonne_index');
        }

        return $this->render('nbpersonne/edit.html.twig', array(
            'nbPersonne' => $nbPersonne,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nbPersonne entity.
     *
     * @Route("/{id}", name="nbpersonne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NbPersonne $nbPersonne)
    {
        $form = $this->createDeleteForm($nbPersonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nbPersonne);
            $em->flush();
        }

        return $this->redirectToRoute('nbpersonne_index');
    }

    /**
     * Creates a form to delete a nbPersonne entity.
     *
     * @param NbPersonne $nbPersonne The nbPersonne entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NbPersonne $nbPersonne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nbpersonne_delete', array('id' => $nbPersonne->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
