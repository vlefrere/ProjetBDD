<?php

namespace MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MainBundle\Entity\GroupStudent;
use MainBundle\Form\GroupStudentType;

/**
 * GroupStudent controller.
 *
 * @Route("/group")
 */
class GroupStudentController extends Controller
{

    /**
     * Lists all GroupStudent entities.
     *
     * @Route("/", name="group")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MainBundle:GroupStudent')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GroupStudent entity.
     *
     * @Route("/create", name="group_create")
     * @Template("MainBundle:GroupStudent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GroupStudent();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            foreach($entity->getStudents() as $student) {
                $student->setGroup($entity);
                $em->persist($entity);
            }

            foreach($entity->getCourses() as $course) {
                $course->setGroup($entity);
                $em->persist($entity);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('group_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a GroupStudent entity.
     *
     * @param GroupStudent $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GroupStudent $entity)
    {
        $form = $this->createForm(new GroupStudentType(), $entity, array(
            'action' => $this->generateUrl('group_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Finds and displays a GroupStudent entity.
     *
     * @Route("/{id}", name="group_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:GroupStudent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GroupStudent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a GroupStudent entity.
    *
    * @param GroupStudent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GroupStudent $entity)
    {
        $form = $this->createForm(new GroupStudentType(), $entity, array(
            'action' => $this->generateUrl('group_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GroupStudent entity.
     *
     * @Route("/update/{id}", name="group_update")
     * @Template("MainBundle:GroupStudent:new.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:GroupStudent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GroupStudent entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            foreach($entity->getStudents() as $student) {
                $student->setGroup($entity);
                $em->persist($entity);
            }

            foreach($entity->getCourses() as $course) {
                $course->setGroup($entity);
                $em->persist($entity);
            }

            $em->flush();
            $entity->createEmptyNote();

            return $this->redirect($this->generateUrl('group_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView()
        );
    }
    /**
     * Deletes a GroupStudent entity.
     *
     * @Route("/{id}", name="group_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MainBundle:GroupStudent')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GroupStudent entity.');
            }

            foreach($entity->getStudents() as $student) {
                $student->setGroup(null);
                $em->persist($student);
            }

            foreach($entity->getCourses() as $course) {
                $course->setGroup(null);
                $em->persist($course);
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('group'));
    }

    /**
     * Creates a form to delete a GroupStudent entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('group_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
