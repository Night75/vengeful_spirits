<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 */
class Link
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;
	 
    /**
     * @var string
     */
    private $url;
	 
    /**
     * @var string
     */
    private $textButton;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \VS\VitrineBundle\Entity\StorageUnique
     */
    private $storage_unique;
	 
    /**
     * @var \VS\VitrineBundle\Entity\DocFile
     */
    private $doc_file;
	 
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
     * Set type
     *
     * @param string $type
     * @return Link
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set textButton
     *
     * @param string $textButton
     * @return Link
     */
    public function setTextButton($textButton)
    {
        $this->textButton = $textButton;
    
        return $this;
    }

    /**
     * Get textButton
     *
     * @return string 
     */
    public function getTextButton()
    {
        return $this->textButton;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Link
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Link
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set storage_unique
     *
     * @param \VS\VitrineBundle\Entity\StorageUnique $storageUnique
     * @return Link
     */
    public function setStorageUnique(\VS\VitrineBundle\Entity\StorageUnique $storageUnique = null)
    {
        $this->storage_unique = $storageUnique;
    
        return $this;
    }

    /**
     * Get storage_unique
     *
     * @return \VS\VitrineBundle\Entity\StorageUnique 
     */
    public function getStorageUnique()
    {
        return $this->storage_unique;
    }


    /**
     * Set doc_file
     *
     * @param \VS\VitrineBundle\Entity\DocFile $docFile
     * @return Link
     */
    public function setDocFile(\VS\VitrineBundle\Entity\DocFile $docFile = null)
    {
        $this->doc_file = $docFile;
    
        return $this;
    }

    /**
     * Get doc_file
     *
     * @return \VS\VitrineBundle\Entity\DocFile 
     */
    public function getDocFile()
    {
        return $this->doc_file;
    }


    /**
     * Set url
     *
     * @param string $url
     * @return Link
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
}