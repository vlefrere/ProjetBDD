<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GradeType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DE', 'number', array(
                'label' => 'Note DE',
                'precision' => 2,
                'required' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('TP', 'number', array(
                'label' => 'Note TP',
                'precision' => 2,
                'required' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('prj', 'number', array(
                'label' => 'Note Projet',
                'precision' => 2,
                'required' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('CE', 'number', array(
                'label' => 'Note CE',
                'precision' => 2,
                'required' => false,
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
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'mainbundle_gradetype';
    }
}
