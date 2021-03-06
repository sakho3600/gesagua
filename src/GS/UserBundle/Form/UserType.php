<?php

namespace GS\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('fNacimiento','date', array('widget'=>'choice', 'format'=>'dd MM yyyy', 'years'=>range(1950,2016), 'placeholder'=>array('year'=>'Año','month'=>'Mes','day'=>'Día')))
            ->add('sexo','choice', array('choices'=>array('H'=>'H','M'=>'M'), 'choices_as_values'=>true,'multiple'=>false,'expanded'=>true))
            ->add('email','email')
            ->add('telefono')
            ->add('tipo','choice',array('choices'=>array('Gestor'=>'Gestor', 'Administrador'=>'Administrador', 'Lecturista'=>'Lecturista', 'Fontanero'=>'Fontanero', 'Auxiliar'=>'Auxiliar'), 'placeholder'=>'Selecciona tipo'))
            ->add('usuario')
            ->add('password','password')
            ->add('save', 'submit', array('label'=>'Crear Usuario'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GS\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
