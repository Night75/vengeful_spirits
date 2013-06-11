<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StorageType
 */
class StorageType {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	public function __toString() {
		return $this->getType();
	}

	/**
	 * Set type
	 *
	 * @param string $type
	 * @return StorageType
	 */
	public function setType($type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string 
	 */
	public function getType() {
		return $this->type;
	}

}