<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="courseName", type="string", length=255)
     */
    private $courseName;

    /**
     * @ORM\Column(name="coef", type="float")
     */
    private $coef;

    /**
     * @ORM\Column(name="de_coef", type="float")
     */
    private $DECoef;

    /**
     * @ORM\Column(name="tp_coef", type="float")
     */
    private $TPCoef;

    /**
     * @ORM\Column(name="pjt_coef", type="float")
     */
    private $PrjCoef;

    /**
     * @ORM\Column(name="ce_coef", type="float")
     */
    private $CECoef;

    /**
     * @var GroupStudent
     *
     * @ORM\ManyToOne(targetEntity="GroupStudent", cascade={"persist", "merge"})
     */
    private $group;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lessonName
     *
     * @param string $courseName
     * @return Course
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
    
        return $this;
    }

    /**
     * Get lessonName
     *
     * @return string 
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @param \MainBundle\Entity\GroupStudent $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return \MainBundle\Entity\GroupStudent
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $CECoef
     */
    public function setCECoef($CECoef)
    {
        $this->CECoef = $CECoef;
    }

    /**
     * @return mixed
     */
    public function getCECoef()
    {
        return $this->CECoef;
    }

    /**
     * @param $DECoef
     */
    public function setDECoef($DECoef)
    {
        $this->DECoef = $DECoef;
    }

    /**
     * @return mixed
     */
    public function getDECoef()
    {
        return $this->DECoef;
    }

    /**
     * @param $PrjCoef
     */
    public function setPrjCoef($PrjCoef)
    {
        $this->PrjCoef = $PrjCoef;
    }

    /**
     * @return mixed
     */
    public function getPrjCoef()
    {
        return $this->PrjCoef;
    }

    /**
     * @param $TPCoef
     */
    public function setTPCoef($TPCoef)
    {
        $this->TPCoef = $TPCoef;
    }

    /**
     * @return mixed
     */
    public function getTPCoef()
    {
        return $this->TPCoef;
    }

    /**
     * @param $coef
     */
    public function setCoef($coef)
    {
        $this->coef = $coef;
    }

    /**
     * @return mixed
     */
    public function getCoef()
    {
        return $this->coef;
    }
}
