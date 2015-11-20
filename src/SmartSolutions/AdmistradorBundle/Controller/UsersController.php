<?php

namespace SmartSolutions\AdmistradorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartSolutions\AdmistradorBundle\Entity\Users;
use SmartSolutions\AdmistradorBundle\Form\UsersType;

/**
 * Users controller.
 *
 */
class UsersController extends Controller
{

    /**
     * Lists all Users entities.
     *
     */
    public function indexAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->findAll();

        return $this->render('SmartSolutionsAdmistradorBundle:Users:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Users entity.
     *
     */
    public function createAction(Request $request)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Users();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->setSecurePassword($entity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('users_show', array('id' => $entity->getId())));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Users:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Users entity.
     *
     * @param Users $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Users $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('users_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Users entity.
     *
     */
    public function newAction()
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $entity = new Users();
        $form   = $this->createCreateForm($entity);

        return $this->render('SmartSolutionsAdmistradorBundle:Users:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Users entity.
     *
     */
    public function showAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Users:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Users entity.
     *
     */
    public function editAction($id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartSolutionsAdmistradorBundle:Users:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Users entity.
    *
    * @param Users $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Users $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('users_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar', 'attr' => array('class' => 'btn btn-success')));

        return $form;
    }
    /**
     * Edits an existing Users entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->find($id);
        $current_pass = $entity->getPassword();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('users_edit', array('id' => $id)));
        }

        return $this->render('SmartSolutionsAdmistradorBundle:Users:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
    /**
     * Deletes a Users entity.
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
            $entity = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Users entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('users'));
    }

     public function updateStateAction($id,$state)
    {
        $em = $this->getDoctrine()->getManager();
        $proveedor = $em->getRepository('SmartSolutionsAdmistradorBundle:Users')->find($id);

        $state_new = true;
        if($state == '1'){
            $state_new = false;
        }
        $proveedor->setIsActive($state_new);
        $em->flush();
        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * Creates a form to delete a Users entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('users_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger' )))
            ->getForm()
        ;
    }
}
