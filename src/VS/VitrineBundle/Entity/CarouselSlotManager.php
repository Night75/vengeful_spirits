<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\BaseManager;

class CarouselSlotManager extends BaseManager
{
	public function prePersist($entity, $recursive = true){
		parent::prePersist($entity, $recursive);
		$user = $this->container->get('security.context')->getToken()->getUser();
		$entity->setAuthor($user);
	}
}
