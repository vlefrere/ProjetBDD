<?php

namespace StudentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use StudentBundle\Entity\User;
use StudentBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller {

    /**
     * Lists all User entities.
     *
     * @Route("/", name="user")
     * @Method("GET")
     * @Template()
     *      *
     * @return array
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StudentBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new User entity.s     *
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @Route("/create", name="user_create")
     *
     * @Template("StudentBundle:User:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $userManager =  $this->get('fos_user.user_manager');
        $entity = $userManager->createUser();
        $form   = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $entity->setUsername($entity->getEmail());
            $entity->addRole($entity->getUserType());

            if ($entity->getUserType() == 'ROLE_STUDENT') {
                return $this->redirect($this->generateUrl('student_create', array('userId' => $entity->getId())));
            } elseif ($entity->getUserType() == 'ROLE_TEACHER') {
                $userTypeEntity = new \StudentBundle\Entity\Teacher();
            } elseif ($entity->getUserType() == 'ROLE_ADMIN') {
                $userTypeEntity = new \StudentBundle\Entity\Scolarity();
            }
            $userTypeEntity->setUser($entity);

            $userManager->updateUser($entity);
            $em->persist($userTypeEntity);
            $em->flush();

            return $this->redirect($this->generateUrl('user'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StudentBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em     = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StudentBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
