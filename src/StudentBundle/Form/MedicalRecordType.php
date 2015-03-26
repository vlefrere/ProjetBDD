<?php

namespace StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicalRecordType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('doctorFirstName', 'text', array(
                'label' => 'Prénom du medecin traitant',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('doctorLastName', 'text', array(
                'label' => 'Nom du medecin traitant',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('doctorPhone', 'text', array(
                'label' => 'Téléphone du medecin traitant',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('vaccination', 'textarea', array(
                'label' => 'Vaccinations',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('allergies', 'textarea', array(
                'label' => 'Allergies',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('others', 'textarea', array(
                'label' => 'Remarques',
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
            'data_class' => 'StudentBundle\Entity\MedicalRecord'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName() {
        return 'studentbundle_medicalrecord';
    }
}