<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\FileStorageManager;

class StorageManager extends FileStorageManager {

	protected $objectManager;
	protected $class;
	protected $repository;

	public function removeEmbedEntities($entity, $embedEntitiesToDel) {

		foreach ($embedEntitiesToDel as $sub) {

			if ($sub instanceof \VS\VitrineBundle\Entity\DocFile) {
				$manager = $this->entityUtil->getManagerFromEntity($sub);
				$entity->removeDocFile($sub);
				$this->container->get($manager)->removeUploadedFile($sub);
				$this->container->get($manager)->removeFromDatabase($sub);
			}
		}
	}


}
