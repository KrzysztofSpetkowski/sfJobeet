<?php

namespace Bootcamp\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Bootcamp\JobeetBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Bootcamp\JobeetBundle\Entity\Apply", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $applications;
    
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    
    protected $lastName;
        
    /** @ORM\Column(name="facebookId", type="string", length=255, nullable=true) */
    protected $facebookId;
 
    /** @ORM\Column(name="facebookAccessToken", type="string", length=255, nullable=true) */
    protected $facebookAccessToken;


    public function __construct() 
    {
        parent::__construct();
        
        $this->jobs = new ArrayCollection();
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
    
    /**
     * Set applications
     *
     * @param string $applications
     * @return User
     */
    
    public function setApplications($applications)
    {
        $this->applications = $applications;
        return $this;
    }
    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplications()
    {
        return $this->applications;
    }
    /**
     * Add jobs
     *
     * @param \Bootcamp\JobeetBundle\Entity\Job $jobs
     * @return User
     */
    public function addJob(\Bootcamp\JobeetBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Bootcamp\JobeetBundle\Entity\Job $jobs
     */
    public function removeJob(\Bootcamp\JobeetBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
    
     /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
    
    /**
     * Get firstName
     *
     * @return string 
     */
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    /**
     * Get lastName
     *
     * @return string 
     */
    
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * Set facebookId
     *
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
 
        return $this;
    }
 
    /**
     * Get facebookId
     *
     * @return string 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }
 
    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;
 
        return $this;
    }
 
    /**
     * Get facebookAccessToken
     *
     * @return string 
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }
}
