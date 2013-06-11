<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocFile
 */
class DocFile
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $path;

    /**
     * @var float
     */
    private $size;

    /**
     * @var string
     */
    private $mime_type;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \VS\VitrineBundle\Entity\Link
     */
    private $storage_unique;

    /**
     * @var \VS\VitrineBundle\Entity\Storage
     */
    private $storage;


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
     * Set file
     *
     * @param string $file
     * @return DocFile
     */
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return DocFile
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set size
     *
     * @param float $size
     * @return DocFile
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return float 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set mime_type
     *
     * @param string $mimeType
     * @return DocFile
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;
    
        return $this;
    }

    /**
     * Get mime_type
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return DocFile
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
     * @param \VS\VitrineBundle\Entity\Link $storageUnique
     * @return DocFile
     */
    public function setStorageUnique(\VS\VitrineBundle\Entity\Link $storageUnique = null)
    {
        $this->storage_unique = $storageUnique;
    
        return $this;
    }

    /**
     * Get storage_unique
     *
     * @return \VS\VitrineBundle\Entity\Link 
     */
    public function getStorageUnique()
    {
        return $this->storage_unique;
    }

    /**
     * Set storage
     *
     * @param \VS\VitrineBundle\Entity\Storage $storage
     * @return DocFile
     */
    public function setStorage(\VS\VitrineBundle\Entity\Storage $storage = null)
    {
        $this->storage = $storage;
    
        return $this;
    }

    /**
     * Get storage
     *
     * @return \VS\VitrineBundle\Entity\Storage 
     */
    public function getStorage()
    {
        return $this->storage;
    }
}