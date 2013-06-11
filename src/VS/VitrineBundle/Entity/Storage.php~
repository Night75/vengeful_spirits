<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Storage
 */
class Storage {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 * @Assert\NotBlank()
	 */
	private $title;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 * @ORM\OneToMany(targetEntity="DocFile", mappedBy="storage", cascade={"all"})
	 */
	private $doc_files;

	/**
	 * @var \VS\VitrineBundle\Entity\StorageType
	 */
	private $storageType;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 * @return Storage
	 */
	public function setTitle($title) {
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->doc_files = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add doc_files
	 *
	 * @param \VS\VitrineBundle\Entity\DocFile $docFiles
	 * @return Storage
	 */
	public function addDocFile(\VS\VitrineBundle\Entity\DocFile $docFile) {
		$this->doc_files[] = $docFile;
		$docFile->setStorage($this);
		return $this;
	}

	/**
	 * Remove doc_files
	 *
	 * @param \VS\VitrineBundle\Entity\DocFile $docFiles
	 */
	public function removeDocFile(\VS\VitrineBundle\Entity\DocFile $docFile) {
//        $docFile->setStorage(null);
//        $docFile->setFile(null);
		$this->doc_files->removeElement($docFile);
	}

	/**
	 * Get doc_files
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getDocFiles() {
		return $this->doc_files;
	}

	/**
	 * Set storageType
	 *
	 * @param \VS\VitrineBundle\Entity\StorageType $storageType
	 * @return Storage
	 */
	public function setStorageType(\VS\VitrineBundle\Entity\StorageType $storageType = null) {
		$this->storageType = $storageType;

		return $this;
	}

	/**
	 * Get storageType
	 *
	 * @return \VS\VitrineBundle\Entity\StorageType 
	 */
	public function getStorageType() {
		return $this->storageType;
	}

}