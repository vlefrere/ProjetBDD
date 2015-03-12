<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grade
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
     * @var integer
     *
     * @ORM\Column(name="prj", type="integer")
     */
    private $prj;

    /**
     * @var integer
     *
     * @ORM\Column(name="DE", type="integer")
     */
    private $dE;

    /**
     * @var integer
     *
     * @ORM\Column(name="CE", type="integer")
     */
    private $cE;

    /**
     * @var integer
     *
     * @ORM\Column(name="TP", type="integer")
     */
    private $tP;


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
     * Set prj
     *
     * @param integer $prj
     * @return Grade
     */
    public function setPrj($prj)
    {
        $this->prj = $prj;
    
        return $this;
    }

    /**
     * Get prj
     *
     * @return integer 
     */
    public function getPrj()
    {
        return $this->prj;
    }

    /**
     * Set dE
     *
     * @param integer $dE
     * @return Grade
     */
    public function setDE($dE)
    {
        $this->dE = $dE;
    
        return $this;
    }

    /**
     * Get dE
     *
     * @return integer 
     */
    public function getDE()
    {
        return $this->dE;
    }

    /**
     * Set cE
     *
     * @param integer $cE
     * @return Grade
     */
    public function setCE($cE)
    {
        $this->cE = $cE;
    
        return $this;
    }

    /**
     * Get cE
     *
     * @return integer 
     */
    public function getCE()
    {
        return $this->cE;
    }

    /**
     * Set tP
     *
     * @param integer $tP
     * @return Grade
     */
    public function setTP($tP)
    {
        $this->tP = $tP;
    
        return $this;
    }

    /**
     * Get tP
     *
     * @return integer 
     */
    public function getTP()
    {
        return $this->tP;
    }
}
