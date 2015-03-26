<?php

namespace StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InChargeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'label' => 'Prénom du responsable',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('lastName', 'text', array(
                'label' => 'Nom du responsable',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('address', 'text', array(
                'label' => 'Adresse du responsable',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('telephone', 'text', array(
                'label' => 'Telephone du responsable',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('email', 'text', array(
                'label' => 'Email du responsable',
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
            'data_class' => 'StudentBundle\Entity\InCharge'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName() {
        return 'studentbundle_incharge';
    }
}