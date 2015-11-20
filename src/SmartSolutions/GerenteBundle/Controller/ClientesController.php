<?php

namespace SmartSolutions\AdmistradorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartSolutions\AdmistradorBundle\Entity\Clientes_2;
use SmartSolutions\AdmistradorBundle\Form\Clientes_2Type;

/**
 * Clientes controller.
 *
 */
class Clientes_2Controller extends Controller
{

    /**
     * Lists all Clientes entities.
     *
     */
    public function indexAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SmartSolutionsAdmistradorBundle:Clientes_2')->findAll();

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Clientes entity.
     *
     */
    public function createAction(Request $request)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Clientes_2();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientes_2_show', array('id' => $entity->getId())));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Clientes entity.
     *
     * @param Clientes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Clientes_2 $entity)
    {
        $form = $this->createForm(new Clientes_2Type(), $entity, array(
            'action' => $this->generateUrl('clientes_2_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Clientes entity.
     *
     */
    public function newAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Clientes_2();
        $form   = $this->createCreateForm($entity);

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Clientes entity.
     *
     */
    public function showAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Clientes_2')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes_2 entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Clientes entity.
     *
     */
    public function editAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Clientes_2')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes_2 entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Clientes entity.
    *
    * @param Clientes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Clientes_2 $entity)
    {
        $form = $this->createForm(new Clientes_2Type(), $entity, array(
            'action' => $this->generateUrl('clientes_2_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Clientes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Clientes_2')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes_2 entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clientes_2_edit', array('id' => $id)));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Clientes_2:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Clientes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Clientes_2')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Clientes_2 entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clientes_2'));
    }

    /**
     * Creates a form to delete a Clientes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientes_2_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
