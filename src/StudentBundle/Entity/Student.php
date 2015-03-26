<?php

namespace StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity
 */
class Student {
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
     * @ORM\Column(name="matricule", type="string", length=8)
     */
    private $matricule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sex", type="boolean")
     */
    private $sex;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerDate", type="date")
     */
    private $registerDate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=5)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="PreviousSchool", type="string", length=255)
     */
    private $previousSchool;

    /**
     * @var string
     *
     * @ORM\Column(name="photoFilename", type="string", length=255, nullable=true)
     */
    private $photoFilename;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeTelephone", type="string", length=10, nullable=true)
     */
    private $homeTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="MobileNumber", type="string", length=10, nullable=true)
     */
    private $mobileNumber;

    /**
     *
     * @ORM\OneToOne(targetEntity="MedicalRecord")
     */
    private $medicalRecord;

    /**
     * @ORM\OneToOne(targetEntity="InCharge")
     */
    private $personInCharge;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\GroupStudent")
     */
    private $group;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Student
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return Student
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set sex
     *
     * @param boolean $sex
     *
     * @return Student
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     *
     * @return Student
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Student
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Student
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Student
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set previousSchool
     *
     * @param string $previousSchool
     *
     * @return Student
     */
    public function setPreviousSchool($previousSchool)
    {
        $this->previousSchool = $previousSchool;

        return $this;
    }

    /**
     * Get previousSchool
     *
     * @return string
     */
    public function getPreviousSchool()
    {
        return $this->previousSchool;
    }

    /**
     * Set photoFilename
     *
     * @param string $photoFilename
     *
     * @return Student
     */
    public function setPhotoFilename($photoFilename)
    {
        $this->photoFilename = $photoFilename;

        return $this;
    }

    /**
     * Get photoFilename
     *
     * @return string
     */
    public function getPhotoFilename()
    {
        return $this->photoFilename;
    }

    /**
     * Set homeTelephone
     *
     * @param string $homeTelephone
     *
     * @return Student
     */
    public function setHomeTelephone($homeTelephone)
    {
        $this->homeTelephone = $homeTelephone;

        return $this;
    }

    /**
     * Get homeTelephone
     *
     * @return string
     */
    public function getHomeTelephone()
    {
        return $this->homeTelephone;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     *
     * @return Student
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    public function getMedicalRecord()
    {
        return $this->medicalRecord;
    }

    public function setMedicalRecord($medicalRecord)
    {
        $this->medicalRecord = $medicalRecord;

        return $this;
    }

    public function setPersonInCharge($personInCharge)
    {
        $this->personInCharge = $personInCharge;

        return $this;
    }

    public function getPersonInCharge()
    {
        return $this->personInCharge;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
