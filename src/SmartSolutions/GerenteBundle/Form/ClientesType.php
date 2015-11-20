<?php

namespace SmartSolutions\AdmistradorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numDocumento', 'text', array('label' => 'Codigo Producto'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('apellido', 'text', array('label' => 'Version'))
            ->add('telefono', 'text', array('label' => 'Precio'))
            ->add('direccion', 'text', array('label' => 'Descripcion'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartSolutions\AdmistradorBundle\Entity\Clientes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartsolutions_admistradorbundle_clientes';
    }
}

