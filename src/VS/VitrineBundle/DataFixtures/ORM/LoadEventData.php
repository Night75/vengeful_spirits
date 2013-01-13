<?php

namespace VS\VitrineBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VS\VitrineBundle\Entity\Event;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$entity = new Event();
		
//		$entity->setTitle("Election du meilleur parrain");
//		$entity->setDescription("Distribution mensuelle des objets");
//		$entity->setEventDate(new \Datetime("2012-"));
//		$em->persist($entity);
		
		$player = array("DevilDevil", "Archangel", "Toto", "AnonymousHacker", "Arvalsak", "Shayne", "Spririts");
		for($i = 0; $i< 6; $i++){
			$entity = new Event();
			$entity->setTitle("Distribution des objets du coffre");
			$entity->setDescription("Distribution mensuelle des objets");
			$entity->setEventDate(new \Datetime("2013-0{$i}-28 20:00"));
			$entity->setAuthor($em->merge($this->getReference('super-admin')));
			$em->persist($entity);
			
			$entity = new Event();
			$entity->setTitle("Streaming de {$player[$i]}");
			$entity->setDescription("Venez découvrir les aventures de ce joueur valeureux");
			$entity->setEventDate(new \Datetime("2013-0{$i}-28 21:00"));
			$entity->setAuthor($em->merge($this->getReference('admin-1')));
			$em->persist($entity);
		}
		$em->flush();
	}
	
	public function getOrder()
	{
		return 12;
	}
}