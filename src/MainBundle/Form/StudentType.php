<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'label' => 'Prénom',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('lastname', 'text', array(
                'label' => 'Nom de famille',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('age', 'integer', array(
                'label' => 'Age',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('submit', 'submit', array(
                'label' => 'Valider',
                'attr' => array(
                    'class' => 'btn btn-success'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mainbundle_student';
    }
}
