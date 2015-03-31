<?php

namespace Bootcamp\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
Use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Job
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bootcamp\JobeetBundle\Entity\JobRepository")
 */
class Job
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\NotBlank()
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="campanyName", type="string", length=255)
     * 
     * @Assert\NotBlank(message="Proszę wprowadzić nazwę firmy")
     */
    private $campanyName;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * 
     * @Gedmo\Slug(fields={"campanyName", "location"})
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint")
     * 
     * @Assert\NotBlank(message="Proszę wprowadzić rodzaj umowy")
     */
    private $type;
/**
     * @Vich\UploadableField(mapping="logo_image", fileNameProperty="logo", nullable=true)
     *
     * @var File $logo
     * 
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     * 
     * @Assert\NotBlank(message="Proszę wprowadzić miejscowość")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     * 
     * @Assert\NotBlank()
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * 
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="howToApply", type="string", length=255)
     * 
     * @Assert\NotBlank()
     */
    private $howToApply;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * @ORM\ManyToOne(targetEntity="Bootcamp\JobeetBundle\Entity\User", inversedBy="jobs")
     * @var User
     */
    protected $user;
    
    /**
     * @ORM\ManyToMany(targetEntity="Bootcamp\JobeetBundle\Entity\Category", inversedBy="jobs") 
     * @var ArrayCollection 
     */
    protected $categories;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="is_accepted", type="boolean")
     */
    private $isAccepted = true;
    
    public function __construct() 
    {
        $this->categories =  new ArrayCollection();
        $this->createdAt = new \DateTime('now');
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
     * Set campanyName
     *
     * @param string $campanyName
     * @return Job
     */
    public function setCampanyName($campanyName)
    {
        $this->campanyName = $campanyName;

        return $this;
    }

    /**
     * Get campanyName
     *
     * @return string 
     */
    public function getCampanyName()
    {
        return $this->campanyName;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Job
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Job
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Job
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Job
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Job
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Job
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Job
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set howToApply
     *
     * @param string $howToApply
     * @return Job
     */
    public function setHowToApply($howToApply)
    {
        $this->howToApply = $howToApply;

        return $this;
    }

    /**
     * Get howToApply
     *
     * @return string 
     */
    public function getHowToApply()
    {
        return $this->howToApply;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Job
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set user
     *
     * @param \Bootcamp\JobeetBundle\Entity\User $user
     * @return Job
     */
    public function setUser(\Bootcamp\JobeetBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Bootcamp\JobeetBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add categories
     *
     * @param \Bootcamp\JobeetBundle\Entity\Category $categories
     * @return Job
     */
    public function addCategory(\Bootcamp\JobeetBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Bootcamp\JobeetBundle\Category $categories
     */
    public function removeCategory(\Bootcamp\JobeetBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Set isAccepted
     *
     * @param boolean $isAccepted
     * @return Jobs
     */
    public function setIsAccepted($isAccepted)
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Get isAccepted
     *
     * @return boolean 
     */
    public function getIsAccepted()
    {
        return $this->isAccepted;
    }
    
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Mems
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
