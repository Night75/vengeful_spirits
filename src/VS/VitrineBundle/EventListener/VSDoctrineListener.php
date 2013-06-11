<?php

namespace VS\VitrineBundle\EventListener;

use Doctrine\ORM\Events;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Doctrine ORM listener updating the canonical fields and the password.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class VSDoctrineListener {

	/**
	 * @var ContainerInterface
	 */
	private $container;

	/*
	 * @var UserManager
	 */
	protected $um; 
	
	/**
	 * Constructor
	 *
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container ) {
		$this->container = $container;
	}

	public function prePersist(LifecycleEventArgs $args) {
		$entity = $args->getEntity();
		$this->handlePreUpdateEvents($entity);
	}

	public function preUpdate(PreUpdateEventArgs $args) {
		$entity = $args->getEntity();
		$this->handlePreUpdateEvents($entity);
	}

	public function postPersist(LifecycleEventArgs $args) {
		$entity = $args->getEntity();
		$this->handlePostUpdateEvents($entity);
	}
	
	public function postUpdate(LifecycleEventArgs $args) {
		$entity = $args->getEntity();	
		$this->handlePostUpdateEvents($entity);	
	}
	
	 public function onFlush(OnFlushEventArgs $eventArgs)
    {
		 echo "onFlush";
		 $em = $eventArgs->getEntityManager();
		$uow = $em->getUnitOfWork();
		foreach ($uow->getScheduledEntityUpdates() as $entity) {
				
        }
	}
	
	public function handlePreUpdateEvents($entity){
		if(method_exists($entity, "setCreatedAt")){
			$entity->setCreatedAt(new \Datetime());
		}
		if(method_exists($entity, "setUpdatedAt")){
			$entity->setUpdatedAt(new \Datetime());
		}	
		echo "handlePreUpdateEvents";
		$entityManager = $this->getManagerFromEntity($entity, $this->container); 
		$entityManager->upload($entity);
		
	}
	
	public function handlePostUpdateEvents($entity){
		if(method_exists($entity, "setUpdatedAt")){
			$entity->setUpdatedAt(new \Datetime());
		}		
	}
	
	
	public function getManagerFromEntity($entity, $container){
		$fullQualifiedClass = get_class($entity);									
		$tab = explode('\\', $fullQualifiedClass );
		
		$manager = strtolower($tab[0]) .".";
		//$manager = strtolower(substr(preg_replace('/\p{Lu}/u', '_\0', $tab[0]), 1)) .".";											// Nom de l'application. Acme => acme
		$i = 1;
		while(!strpos($tab[$i], "Bundle") > 0){		
			++$i;
		}
		$manager .= strtolower(substr(preg_replace('/\p{Lu}/u', '_\0', $tab[$i]), 1, -7)) .".";										// Nom du bundle. SuperBonBundle => super_bon
		$manager .= strtolower(substr(preg_replace('/\p{Lu}/u', '_\0', $tab[count($tab) -1 ]), 1));								// Nom de l'entite. ImageOcean => image_ocean
		$manager .= "_manager";																													// Suffixe : _manager
		
		return $this->container->get($manager);
	}

}