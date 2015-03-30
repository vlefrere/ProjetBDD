<?php
namespace MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MainBundle\Entity\Course;
use MainBundle\Form\CourseType;

/**
 * Course controller.
 *
 * @Route("/grade")
 */
class GradeController extends Controller {

    /**
     * @Route("/create/{id}", name="grade_create")
     * @Template("MainBundle:Grade:create.html.twig")
     */
    public function gradeCreateAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$student) {
            throw $this->createNotFoundException('Student with id ' . $id . ' not found');
        }

        return array(
            'student' => $student
        );
    }

    /**
     * @Route("/report/{id}", name="show_report")
     * @Template()
     */
    public function showReportAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$student) {
            throw $this->createNotFoundException('Student with id ' . $id . ' was not found.');
        }

        $report = $em->getRepository('MainBundle:Grade')->getReport($student);

        return array(
            'report'  => $report,
            'student' => $student
        );
    }

    /**
     * @Route("/generate/form", name="grade_create_form")
     * @Template("MainBundle:Grade:createForm.html.twig")
     */
    public function gradeCreateFormAction(Request $request)
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('StudentBundle:Student')->find($request->get('studentId'));
        $course  = $em->getRepository('MainBundle:Course')->find($request->get('courseId'));

        if (!in_array($course, $student->getGroup()->getCourses()->toArray())) {
            $this->createNotFoundException("The student doesn't have this course");
        }
        $grade = $em->getRepository('MainBundle:Grade')->findOneBy(array('student' => $student, 'course' => $course));

        if (!$grade) {
            $grade = new \MainBundle\Entity\Grade();
            $grade->setStudent($student);
            $grade->setCourse($course);
        }

        $form = $this->createForm(new \MainBundle\Form\GradeType(), $grade, array(
            'action' => $this->generateUrl('grade_create_form'),
            'method' => 'POST'
        ));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($grade);
            if (!$student->getGrades()->contains($grade)) {
                $student->addGrade($grade);
                $em->persist($student);
            }
            $report = $student->getReport();
            $report->setWasValidated(false);
            $em->persist($report);
            $em->flush();

            return $this->redirect($this->generateUrl('grade_create', array('id' => $student->getId())));
        }

        return array(
            'student' => $student,
            'course'  => $course,
            'form'    => $form->createView()
        );
    }

    /**
     * @Route("/print/{id}", name="print_report")
     */
    public function printReportAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$student) {
            throw $this->createNotFoundException('Student with id ' . $id . ' was not found.');
        }

        $report = $student->getReport();
        $report->setWasPrinted(true);
        $em->persist($report);
        $em->flush();

        $html = $this->renderView('MainBundle:Grade:printReport.html.twig', array(
            'report'  => $em->getRepository('MainBundle:Grade')->getReport($student),
            'student' => $student
        ));

        return new \Symfony\Component\BrowserKit\Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );
    }

    /**
     * @Route("/report/validate/{id}", name="validate_report")
     */
    public function validateReportAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $student = $em->getRepository('StudentBundle:Student')->find($id);

        if (!$student) {
            throw $this->createNotFoundException('Student with id ' . $id . ' was not found.');
        }

        $report = $student->getReport();
        $report->setWasValidated(true);
        $em->persist($report);
        $em->flush();

        return $this->redirect($this->generateUrl('show_report', array('id' => $id)));
    }
}