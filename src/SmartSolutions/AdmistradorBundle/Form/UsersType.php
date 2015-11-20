<?php

namespace SmartSolutions\AdmistradorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text' ,array('attr' => array('class' => 'validate') ))
            ->add('nombre', 'text' ,array('attr' => array('class' => 'validate') ))
            ->add('apellido', 'text' ,array('attr' => array('class' => 'validate') ))
            ->add('numDocumento', 'number' ,array('attr' => array('class' => 'validate') ))
            ->add('email', 'email' ,array('attr' => array('class' => 'validate') ))
            ->add('telefono', 'number' ,array('attr' => array('class' => 'validate') ))
            ->add('salarioBasico', 'text' ,array('attr' => array('class' => 'validate') ))
            ->add('grupo' ,'entity', array(
                        'class' => 'SmartSolutionsAdmistradorBundle:Grupo', 
                        'property' => 'nombre', 
                        'required' => false,
                        'multiple' => false,
                        'expanded' => false
                        , 'attr' => array('class' => 'browser-default')
                        ))
            ->add('password', 'password' ,array('attr' => array('class' => 'validate'), 'required' => false))
            ->add('eps','entity', array('class' => 'SmartSolutionsAdmistradorBundle:Eps', 'property' => 'nombre', 'attr' => array('class' => 'browser-default') ))
            ->add('pension','entity', array('class' => 'SmartSolutionsAdmistradorBundle:Pension', 'property' => 'nombre', 'attr' => array('class' => 'browser-default') ))
            ->add('isactive', 'checkbox' , array('label' => 'Estado', 'attr' => array('class' => 'lever') ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartSolutions\AdmistradorBundle\Entity\Users'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartsolutions_admistradorbundle_users';
    }
}
