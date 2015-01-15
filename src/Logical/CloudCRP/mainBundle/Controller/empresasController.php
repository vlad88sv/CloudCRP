<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Logical\CloudCRP\mainBundle\Entity\empresas;
use Logical\CloudCRP\mainBundle\Form\empresasType;

/**
 * empresas controller.
 *
 */
class empresasController extends Controller
{

    /**
     * Lists all empresas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LCCMainBundle:empresas')->findAll();

        return $this->render('LCCMainBundle:empresas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new empresas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new empresas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empresas_show', array('id' => $entity->getId())));
        }

        return $this->render('LCCMainBundle:empresas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a empresas entity.
     *
     * @param empresas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(empresas $entity)
    {
        $form = $this->createForm(new empresasType(), $entity, array(
            'action' => $this->generateUrl('empresas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new empresas entity.
     *
     */
    public function newAction()
    {
        $entity = new empresas();
        $form   = $this->createCreateForm($entity);

        return $this->render('LCCMainBundle:empresas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empresas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LCCMainBundle:empresas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LCCMainBundle:empresas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empresas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LCCMainBundle:empresas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LCCMainBundle:empresas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a empresas entity.
    *
    * @param empresas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(empresas $entity)
    {
        $form = $this->createForm(new empresasType(), $entity, array(
            'action' => $this->generateUrl('empresas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing empresas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LCCMainBundle:empresas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('empresas_edit', array('id' => $id)));
        }

        return $this->render('LCCMainBundle:empresas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a empresas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LCCMainBundle:empresas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find empresas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('empresas'));
    }

    /**
     * Creates a form to delete a empresas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empresas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
