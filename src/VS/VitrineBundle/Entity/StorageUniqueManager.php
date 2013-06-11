<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\FileStorageManager;

class StorageUniqueManager extends FileStorageManager {

	protected $objectManager;
	protected $class;
	protected $repository;

}
