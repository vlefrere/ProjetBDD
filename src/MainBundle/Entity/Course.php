<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity
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
     * @ORM\Column(name="lessonName", type="string", length=255)
     */
    private $lessonName;


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
     * @param string $lessonName
     * @return Lesson
     */
    public function setLessonName($lessonName)
    {
        $this->lessonName = $lessonName;
    
        return $this;
    }

    /**
     * Get lessonName
     *
     * @return string 
     */
    public function getLessonName()
    {
        return $this->lessonName;
    }
}
