<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupStudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Nom',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('students', 'genemu_jqueryselect2_entity', array(
                'label' => 'Etudiants',
                'class' => 'StudentBundle\Entity\Student',
                'query_builder' => function(\StudentBundle\Repository\StudentRepository $repo) {
                    return $repo->getStudentWithoutGroupQB();
                },
                'multiple' => true
            ))
            ->add('courses', 'genemu_jqueryselect2_entity', array(
                'label' => 'Cours',
                'class' => 'MainBundle\Entity\Course',
                'property' => 'courseName',
                'multiple' => true,
                'query_builder' => function(\MainBundle\Repository\CourseRepository $repo) {
                    return $repo->getCourseWithoutGroupQB();
                },
                'attr' => array(
                    'style' => 'style="width: 50%;'
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
            'data_class' => 'MainBundle\Entity\GroupStudent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mainbundle_groupstudent';
    }
}
