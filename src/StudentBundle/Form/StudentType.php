<?php

namespace StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('birthdate', 'date', array(
            'label' => 'Date de naissance',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('sex', 'choice', array(
            'label'    => 'Sexe',
            'choices'  => array(
                'M' => 'M',
                'F' => 'F'
            ),
            'expanded' => true,
            'multiple' => false,
            'attr'     => array(
                'class' => 'form-control'
            )
        ))
            ->add('address', 'text', array(
            'label' => 'Adresse',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('zipCode', 'text', array(
            'label' => 'Code Postal',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('city', 'text', array(
            'label' => 'Ville',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('previousSchool', 'text', array(
            'label' => 'Etablissement Précédent',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('photoFilename', 'text', array(
            'label' => 'Photo',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('homeTelephone', 'text', array(
            'label' => 'Telephone',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('mobileNumber', 'text', array(
            'label' => 'Portable',
            'attr'  => array(
                'class' => 'form-control'
            )
        ))
            ->add('submit', 'submit', array(
            'label' => 'Valider',
            'attr'  => array(
                'class' => 'btn btn-success'
            )
        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StudentBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'studentbundle_student';
    }
}
