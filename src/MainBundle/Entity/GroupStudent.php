<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GroupStudent
 *
 * @ORM\Table(name="group_student")
 * @ORM\Entity
 */
class GroupStudent {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=256)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StudentBundle\Entity\Student", mappedBy="group", cascade={"persist", "merge"})
     */
    private $students;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Course", mappedBy="group", cascade={"persist", "merge"})
     */
    private $courses;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $courses
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    public function createEmptyNote(\Doctrine\ORM\EntityManager $em)
    {
        foreach($this->students as $student) {
            foreach($this->courses as $course) {
                if(!$student->hasGradeFor($course)) {
                    $grade = new Grade();
                    $grade->setStudent($student);
                    $grade->setCourse($course);
                    $student->addGrade($grade);

                    $em->persist($grade);
                }
            }
            $em->persist($student);
        }
        $em->flush();
    }
}
