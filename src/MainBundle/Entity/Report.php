<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Report {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wasPrinted", type="boolean")
     */
    private $wasPrinted = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wasValidated", type="boolean")
     */
    private $wasValidated = false;


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
     * Set wasPrinted
     *
     * @param boolean $wasPrinted
     *
     * @return Report
     */
    public function setWasPrinted($wasPrinted)
    {
        $this->wasPrinted = $wasPrinted;

        return $this;
    }

    /**
     * Get wasPrinted
     *
     * @return boolean
     */
    public function getWasPrinted()
    {
        return $this->wasPrinted;
    }

    /**
     * Set wasValidated
     *
     * @param boolean $wasValidated
     *
     * @return Report
     */
    public function setWasValidated($wasValidated)
    {
        $this->wasValidated = $wasValidated;

        return $this;
    }

    /**
     * Get wasValidated
     *
     * @return boolean
     */
    public function getWasValidated()
    {
        return $this->wasValidated;
    }
}
