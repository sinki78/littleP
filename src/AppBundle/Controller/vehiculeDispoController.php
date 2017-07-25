<?php

namespace AppBundle\Controller;

use AppBundle\Entity\vehiculeDispo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiculedispo controller.
 *
 * @Route("vehiculedispo")
 */
class vehiculeDispoController extends Controller
{
    /**
     * Lists all vehiculeDispo entities.
     *
     * @Route("/", name="vehiculedispo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculeDispos = $em->getRepository('AppBundle:vehiculeDispo')->findAll();
        return $this->render('vehiculedispo/index.html.twig', array(
            'vehiculeDispos' => $vehiculeDispos,
        ));
    }

    /**
     * Creates a new vehiculeDispo entity.
     *
     * @Route("/new", name="vehiculedispo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehiculeDispo = new Vehiculedispo();
        $form = $this->createForm('AppBundle\Form\vehiculeDispoType', $vehiculeDispo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiculeDispo);
            $em->flush();

            return $this->redirectToRoute('vehiculedispo_index');
        }

        return $this->render('vehiculedispo/new.html.twig', array(
            'vehiculeDispo' => $vehiculeDispo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehiculeDispo entity.
     *
     * @Route("/{id}", name="vehiculedispo_show")
     * @Method("GET")
     */
    public function showAction(vehiculeDispo $vehiculeDispo)
    {
        $deleteForm = $this->createDeleteForm($vehiculeDispo);

        return $this->render('vehiculedispo/show.html.twig', array(
            'vehiculeDispo' => $vehiculeDispo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehiculeDispo entity.
     *
     * @Route("/{id}/edit", name="vehiculedispo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, vehiculeDispo $vehiculeDispo)
    {
        $deleteForm = $this->createDeleteForm($vehiculeDispo);
        $editForm = $this->createForm('AppBundle\Form\vehiculeDispoType', $vehiculeDispo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('vehiculedispo_index');

        }

        return $this->render('vehiculedispo/edit.html.twig', array(
            'vehiculeDispo' => $vehiculeDispo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehiculeDispo entity.
     *
     * @Route("/{id}", name="vehiculedispo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, vehiculeDispo $vehiculeDispo)
    {
        $form = $this->createDeleteForm($vehiculeDispo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiculeDispo);
            $em->flush();
        }

        return $this->redirectToRoute('vehiculedispo_index');
    }

    /**
     * Creates a form to delete a vehiculeDispo entity.
     *
     * @param vehiculeDispo $vehiculeDispo The vehiculeDispo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(vehiculeDispo $vehiculeDispo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiculedispo_delete', array('id' => $vehiculeDispo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
