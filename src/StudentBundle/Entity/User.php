<?php

namespace StudentBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstName", type="string", length=256)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="lastName", type="string", length=256)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="user_type", type="string", length=256)
     */
    protected $userType;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function setUserType($type)
    {
        $this->userType = $type;
        return $this;
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
