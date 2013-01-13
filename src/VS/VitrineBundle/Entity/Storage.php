<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Storage
 */
class Storage
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var string
     */
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $doc_files;

		
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
     * Constructor
     */
    public function __construct()
    {
        $this->doc_files = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return Storage
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add doc_files
     *
     * @param \VS\VitrineBundle\Entity\DocFile $docFiles
     * @return Storage
     */
    public function addDocFile(\VS\VitrineBundle\Entity\DocFile $docFiles)
    {
        $this->doc_files[] = $docFiles;
	   $docFiles->setStorage($this);
        return $this;
    }

    /**
     * Remove doc_files
     *
     * @param \VS\VitrineBundle\Entity\DocFile $docFiles
     */
    public function removeDocFile(\VS\VitrineBundle\Entity\DocFile $docFiles)
    {
        $this->doc_files->removeElement($docFiles);
    }

    /**
     * Get doc_files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocFiles()
    {
        return $this->doc_files;
    }
}