<?php

namespace StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scolarity
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Scolarity {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
