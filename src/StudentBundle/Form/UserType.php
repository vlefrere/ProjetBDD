<?php

namespace StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', array(
                'label' => 'Prénom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('lastName', 'text', array(
                'label' => 'Nom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('email', 'text', array(
                'label' => 'Email',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('plainPassword', 'password', array(
                'label' => 'Mot de passe',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('userType', 'choice', array(
                'label' => 'Role d\'utilisateur',
                'expanded' => true,
                'multiple' => false,
                'choices' => array(
                    'ROLE_STUDENT' => 'Etudiant',
                    'ROLE_TEACHER' => 'Professeur',
                    'ROLE_ADMIN' => 'Scolarité / Admin'
                ),
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
            'data_class' => 'StudentBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'studentbundle_user';
    }
}
