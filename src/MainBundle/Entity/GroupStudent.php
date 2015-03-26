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
class GroupStudent
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
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="StudentBundle\Entity\Student", mappedBy="group", cascade={"persist", "remove", "merge"})
     */
    private $students;

    public function __construct() {
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
}