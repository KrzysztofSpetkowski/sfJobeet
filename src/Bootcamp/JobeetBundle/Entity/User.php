<?php

namespace Bootcamp\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 *
 * @ORM\Table()
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
     * @ORM\OneToMany(targetEntity="Bootcamp\JobeetBundle\Entity\Job", mappedBy="user")
     *
     * @var ArrayCollection
     */
    protected $jobs;
    
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
}
