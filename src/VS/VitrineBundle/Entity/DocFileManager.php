<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\BaseManager;

class DocFileManager extends BaseManager 
{
	protected $objectManager;
	protected $class;
	protected $repository;
	
	public function upload($entity) {	
		parent::upload($entity);
		
		// ==== Si il n'y a aucun fichier dans l'entite alors on la supprime
		foreach ($this->files as $fileProperty) {
			$fileGetter =  $this->classUtil->propertyNameToGetter($fileProperty); 
			$file = $entity->$fileGetter();
			if(!empty($file)){
				break;
			}
		}
		echo "Pre delete";
		$this->delete($entity);
		echo "post delete";
	}
	
}