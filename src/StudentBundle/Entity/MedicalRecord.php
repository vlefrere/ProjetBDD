<?php

namespace StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MedicalRecord
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MedicalRecord
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
     * @ORM\Column(name="doctorFirstName", type="string", length=255)
     */
    private $doctorFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="doctorLastName", type="string", length=255)
     */
    private $doctorLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="doctorPhone", type="string", length=10)
     */
    private $doctorPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="vaccination", type="string", length=255)
     */
    private $vaccination;

    /**
     * @var string
     *
     * @ORM\Column(name="allergies", type="string", length=255)
     */
    private $allergies;

    /**
     * @var string
     *
     * @ORM\Column(name="others", type="string", length=255)
     */
    private $others;


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
     * Set doctorFirstName
     *
     * @param string $doctorFirstName
     * @return MedicalRecord
     */
    public function setDoctorFirstName($doctorFirstName)
    {
        $this->doctorFirstName = $doctorFirstName;
    
        return $this;
    }

    /**
     * Get doctorFirstName
     *
     * @return string 
     */
    public function getDoctorFirstName()
    {
        return $this->doctorFirstName;
    }

    /**
     * Set doctorLastName
     *
     * @param string $doctorLastName
     * @return MedicalRecord
     */
    public function setDoctorLastName($doctorLastName)
    {
        $this->doctorLastName = $doctorLastName;
    
        return $this;
    }

    /**
     * Get doctorLastName
     *
     * @return string 
     */
    public function getDoctorLastName()
    {
        return $this->doctorLastName;
    }

    /**
     * Set doctorPhone
     *
     * @param string $doctorPhone
     * @return MedicalRecord
     */
    public function setDoctorPhone($doctorPhone)
    {
        $this->doctorPhone = $doctorPhone;
    
        return $this;
    }

    /**
     * Get doctorPhone
     *
     * @return string 
     */
    public function getDoctorPhone()
    {
        return $this->doctorPhone;
    }

    /**
     * Set vaccination
     *
     * @param string $vaccination
     * @return MedicalRecord
     */
    public function setVaccination($vaccination)
    {
        $this->vaccination = $vaccination;
    
        return $this;
    }

    /**
     * Get vaccination
     *
     * @return string 
     */
    public function getVaccination()
    {
        return $this->vaccination;
    }

    /**
     * Set allergies
     *
     * @param string $allergies
     * @return MedicalRecord
     */
    public function setAllergies($allergies)
    {
        $this->allergies = $allergies;
    
        return $this;
    }

    /**
     * Get allergies
     *
     * @return string 
     */
    public function getAllergies()
    {
        return $this->allergies;
    }

    /**
     * Set others
     *
     * @param string $others
     * @return MedicalRecord
     */
    public function setOthers($others)
    {
        $this->others = $others;
    
        return $this;
    }

    /**
     * Get others
     *
     * @return string 
     */
    public function getOthers()
    {
        return $this->others;
    }
}
