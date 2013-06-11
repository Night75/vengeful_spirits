<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\BaseManager;

class ArticleManager extends BaseManager 
{
	protected $objectManager;
	protected $class;
	protected $repository;
	protected $files = array();
	protected $uploadDir = "web/uploads/articles/";
	
	public function prePersist($entity, $recursive = true){
		parent::prePersist($entity, $recursive);
		$user = $this->container->get('security.context')->getToken()->getUser();
		$entity->setAuthor($user);
	}
}
