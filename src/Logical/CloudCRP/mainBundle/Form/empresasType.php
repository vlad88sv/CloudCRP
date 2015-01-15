<?php

namespace Logical\CloudCRP\mainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class empresasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('razonSocial')
            ->add('registroIva')
            ->add('nit')
            ->add('direccion1')
            ->add('direccion2')
            ->add('activo')
            ->add('tipo', null, array('required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Logical\CloudCRP\mainBundle\Entity\empresas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'logical_cloudcrp_mainbundle_empresas';
    }
}
