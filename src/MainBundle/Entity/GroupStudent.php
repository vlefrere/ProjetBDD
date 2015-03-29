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
     * @ORM\OneToMany(targetEntity="StudentBundle\Entity\Student", mappedBy="group", cascade={"persist", "remove", "merge"})
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
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
}
