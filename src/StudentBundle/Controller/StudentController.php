<?php

namespace StudentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use StudentBundle\Entity\Student;
use StudentBundle\Form\StudentType;

/**
 * Student controller.
 *
 * @Route("/student")
 */
class StudentController extends Controller
{

    /**
     * Lists all Student entities.
     *
     * @Route("/", name="student")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StudentBundle:Student')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Student entity.
     *
     * @Route("/create/{userId}", name="student_create")
     * @Template("StudentBundle:Student:new.html.twig")
     */
    public function createAction(Request $request, $userId)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Student();
        $user = $em->getRepository('StudentBundle:User')->find($userId);

        if($user == null) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('student_create', array('userId' => $userId)),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setUser($user);
            $report = new \MainBundle\Entity\Report();
            $entity->setReport($report);

            $em->persist($report);
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('student_create_medical', array('studentId' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user' => $user
        );
    }

    /**
     * @Route("/create/medical/{studentId}", name="student_create_medical")
     * @Template("StudentBundle:Student:createMedical.html.twig")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param                                           $s  tudentId
     */
    public function createMedicalRecordAction(Request $request, $studentId)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new \StudentBundle\Entity\MedicalRecord();
        $student = $em->getRepository('StudentBundle:Student')->find($studentId);

        if(!$student) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $form = $this->createForm(new \StudentBundle\Form\MedicalRecordType(), $entity, array(
            'action' => $this->generateUrl('student_create_medical', array('studentId' => $studentId)),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if($form->isValid()) {
            $student->setMedicalRecord($entity);
            $em->persist($entity);
            $em->persist($student);
            $em->flush();

            return $this->redirect($this->generateUrl('student_create_incharge', array('studentId' => $studentId)));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'student' => $student
        );
    }

    /**
     * @Route("/student/create/incharge/{studentId}", name="student_create_incharge")
     * @Template("StudentBundle:Student:createInCharge.html.twig")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param                                           $studentId
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function createInChargeAction(Request $request, $studentId)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new \StudentBundle\Entity\InCharge();
        $student = $em->getRepository('StudentBundle:Student')->find($studentId);

        if(!$student) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $form = $this->createForm(new \StudentBundle\Form\InChargeType(), $entity, array(
            'action' => $this->generateUrl('student_create_incharge', array('studentId' => $studentId)),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if($form->isValid()) {
            $student->setPersonInCharge($entity);
            $em->persist($entity);
            $em->persist($student);
            $em->flush();

            return $this->redirect($this->generateUrl('student_show', array('id' => $studentId)));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'student' => $student
        );
    }

    /**
     * Finds and displays a Student entity.
     *
     * @Route("/{id}", name="student_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Student entity.
     *
     * @Route("/{id}/edit", name="student_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Student $entity)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('student_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Student entity.
     *
     * @Route("/{id}", name="student_update")
     * @Method("PUT")
     * @Template("StudentBundle:Student:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('student_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Student entity.
     *
     * @Route("/{id}", name="student_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StudentBundle:Student')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Student entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('student'));
    }

    /**
     * Creates a form to delete a Student entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('student_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
