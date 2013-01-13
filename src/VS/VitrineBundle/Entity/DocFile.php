<?php

namespace VS\VitrineBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * DocFile
 */
class DocFile {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var \VS\VitrineBundle\Entity\Storage
	 */
	private $storage;

	/**
	 * @Assert\File(maxSize = "1024k")
	 */
	private $file_add;
	private $file_delete;
	private $file;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set storage
	 *
	 * @param \VS\VitrineBundle\Entity\Storage $storage
	 * @return DocFile
	 */
	public function setStorage(\VS\VitrineBundle\Entity\Storage $storage = null) {
		$this->storage = $storage;

		return $this;
	}

	/**
	 * Get storage
	 *
	 * @return \VS\VitrineBundle\Entity\Storage 
	 */
	public function getStorage() {
		return $this->storage;
	}

	public function getFileAdd() {
		return $this->file_add;
	}

	public function setFileAdd($file_add) {
		$this->file_add = $file_add;
	}

	public function getFile() {
		return $this->file;
	}

	public function setFile($file) {
		$this->file = $file;
	}

	public function getFileDelete() {
		return $this->file_delete;
	}

	public function setFileDelete($file_delete) {
		$this->file_delete = $file_delete;
	}



}