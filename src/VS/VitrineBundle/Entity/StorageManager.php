<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\BaseManager;

class StorageManager extends BaseManager 
{
	protected $objectManager;
	protected $class;
	protected $repository;
}
