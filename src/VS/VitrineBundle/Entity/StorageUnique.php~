<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StorageUnique
 */
class StorageUnique
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
     * @var \VS\VitrineBundle\Entity\Link
     */
    private $link;

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
     * Set title
     *
     * @param string $title
     * @return StorageUnique
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
     * Set link
     *
     * @param \VS\VitrineBundle\Entity\Link $link
     * @return StorageUnique
     */
    public function setLink(\VS\VitrineBundle\Entity\Link $link = null)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return \VS\VitrineBundle\Entity\Link 
     */
    public function getLink()
    {
        return $this->link;
    }
}