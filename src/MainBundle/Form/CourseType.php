<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CourseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('courseName', 'text', array(
                'label' => 'Nom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('coef', 'number', array(
                'label' => 'Coefficient',
                'precision' => 2,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('de_coef', 'number', array(
                'label' => 'Coefficient DE',
                'precision' => 2,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('tp_coef', 'number', array(
                'label' => 'Coefficient TP',
                'precision' => 2,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('prj_coef', 'number', array(
                'label' => 'Coefficient Projet',
                'precision' => 2,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('ce_coef', 'number', array(
                'label' => 'Coefficient CE',
                'precision' => 2,
                'attr' => array(
                    'class' => 'form-control'
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
            'data_class' => 'MainBundle\Entity\Course'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mainbundle_course';
    }
}
