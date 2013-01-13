<?php

namespace VS\VitrineBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
		
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	/**
	* @var ContainerInterface
	*/
	private $container;

	/**
	* {@inheritDoc}
	*/
	public function setContainer(ContainerInterface $container = null)	{
			$this->container = $container;
	}
				
	public function load(ObjectManager $em) {
		$manager = $this->container->get('fos_user.user_manager');

		// ==== Super Admin
		$entity = $manager->createUser();
		$entity->setUsername('Night');
		$entity->setEmail('night@fall.com');
		$entity->setPlainPassword('intheshadows');
		$entity->setGender("M");
		$entity->setBirthday(new \Datetime("1986-12-01"));
		$entity->setAvatar('night.jpeg');
		$entity->setRoles(array("ROLE_ADMIN"));
		$entity->setEnabled(true);	
		$manager->updateUser($entity, true);
		
		$this->addReference('super-admin', $entity);
		
		// ====  Admin 1
		$entity = $manager->createUser();
		$entity->setUsername('Morgana');
		$entity->setEmail('devil@may.cry');
		$entity->setPlainPassword('intheshadows');
		$entity->setGender("F");
		$entity->setBirthday(new \Datetime("1970-08-11"));
		$entity->setAvatar('devil.jpg');
		$entity->setRoles(array("ROLE_ADMIN"));
		$entity->setEnabled(true);	
		$manager->updateUser($entity, true);
		
		$this->addReference('admin-1', $entity);
		
		// ==== Admin 2
		$entity = $manager->createUser();
		$entity->setUsername('toto');
		$entity->setEmail('toto@neuneu.com');
		$entity->setPlainPassword('intheshadows');
		$entity->setGender("M");
		$entity->setBirthday(new \Datetime("1999-05-22"));
		$entity->setAvatar('_Enjoy_your_breakfast__by_nocturnalMoTH.jpg');
		$entity->setRoles(array("ROLE_ADMIN"));
		$entity->setEnabled(true);	
		$manager->updateUser($entity, true);
		
		$this->addReference('admin-2', $entity);
		

	}

	public function getOrder() {
		return 1;
	}

}