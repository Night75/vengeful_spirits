<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\FileManager;

class DocFileManager extends FileManager {

	protected $objectManager;
	protected $class;
	protected $repository;

	protected $parentEntities = array("storage");
	/*
	 * Entity est en fait obligatoire, l'egalite à null est necessaire pour est compatible au BasManager
	 */
	public function getUploadDir($entity = null) {
	
		//foreach($parentEntities as $parentEntity){
			
			if($parent = $entity->getStorage()){
				if(!$parentId = $parent->getId()){
					$parentManager = $this->entityUtil->getManagerFromEntity($parent);
					$parentId = $this->container->get($parentManager)->getLatestId() + 1;
				}
				$uploadDir = "/uploads/storage/" .$parentId;
			}
			elseif($parent = $entity->getStorageUnique()){
				if(!$parentId = $parent->getId()){
					$parentManager = $this->entityUtil->getManagerFromEntity($parent);
					$parentId = $this->container->get($parentManager)->getLatestId() + 1;
				}
				$uploadDir = "/uploads/storageunique/" .$parentId;
			}
	
		if(empty($uploadDir)){
			throw new InvalidArgumentException("L'entite %s n'a pas de classe parente correspondante.". get_class($entity));
		}
		return $uploadDir;
	}
	
}