<?php

namespace Bootcamp\JobeetBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Bootcamp\JobeetBundle\Form\ApplyController;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Apply
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Apply
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
     * @ORM\Column(name="userId", type="string", length=255)
     */
    
     /**
     * @ORM\ManyToOne(targetEntity="Bootcamp\JobeetBundle\Entity\User", inversedBy="applications")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * @var Bootcamp\JobeetBundle\Entity\User
     */
    private $createdBy;

   
     /**
     * @Vich\UploadableField(mapping="job_image", fileNameProperty="imageName")
     *
     * @var File $imageFile
     * @Assert\NotBlank() 
     */
    
     protected $imageFile;
    
    /**
     * @Vich\UploadableField(mapping="job_image", fileNameProperty="imageName")
     *
     * @var File $coverFile
     */
    
    protected $coverFile;
    
    /**
     * @Vich\UploadableField(mapping="job_image", fileNameProperty="imageName")
     *
     * @var File $file
     */
    
    protected $file;
    
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
     * Set userId
     * 
     * @param \string $user
     * @return Apply
     */
    
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string 
     */
    
    public function getUserId()
    {
        return $this->userId;
    }


    /**
     * Set createdBy
     *
     * @param \Bootcamp\JobeetBundle\Entity\User $createdBy
     * @return Aplly
     */
    public function setCreatedBy(\Bootcamp\JobeetBundle\Entity\User $createdBy = Null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Get createdBy
     *
     * @return \Bootcamp\JobeetBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    /**
     * Set imageFile
     *
     * @param string $imageFile
     * 
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    /**
     * Get imageFile
     *
     * @return file 
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * Set coverFile
     *
     * @param File $coverFile
     */
    public function setCoverFile(File $coverFile)
    {
        $this->coverFile = $coverFile;
    }
    
    /**
     * Get coverFile
     *
     * @return File
     */
    public function getCoverFile()
    {
        return $this->coverFile;
    }
    /**
     * Set file
     *
     * @param File $file
     */
    public function setFile(File $file)
    {
        $this->file = $file;
    }
    
    /**
     * Get file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }
    
}
