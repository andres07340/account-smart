<?php

namespace SmartSolutions\AdmistradorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartSolutions\AdmistradorBundle\Entity\Eps;
use SmartSolutions\AdmistradorBundle\Form\EpsType;

/**
 * Eps controller.
 *
 */
class EpsController extends Controller
{

    /**
     * Lists all Eps entities.
     *
     */
    public function indexAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SmartSolutionsAdmistradorBundle:Eps')->findAll();

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Eps entity.
     *
     */
    public function createAction(Request $request)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Eps();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eps_show', array('id' => $entity->getId())));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Eps entity.
     *
     * @param Eps $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Eps $entity)
    {
        $form = $this->createForm(new EpsType(), $entity, array(
            'action' => $this->generateUrl('eps_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Eps entity.
     *
     */
    public function newAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Eps();
        $form   = $this->createCreateForm($entity);

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Eps entity.
     *
     */
    public function showAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Eps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Eps entity.
     *
     */
    public function editAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Eps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eps entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Eps entity.
    *
    * @param Eps $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Eps $entity)
    {
        $form = $this->createForm(new EpsType(), $entity, array(
            'action' => $this->generateUrl('eps_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Eps entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Eps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eps_edit', array('id' => $id)));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Eps:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Eps entity.
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
            $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Eps')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Eps entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eps'));
    }

    /**
     * Creates a form to delete a Eps entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eps_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
