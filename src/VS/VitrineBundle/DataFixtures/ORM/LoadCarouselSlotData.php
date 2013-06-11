<?php

namespace VS\VitrineBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VS\VitrineBundle\Entity\CarouselSlot;

class LoadCarouselSlotData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$entity = new CarouselSlot();
		$entity->setTitle("Rejoignez Ldc, super slogan in here!");
		$entity->setContent("Communaute de joueurs chics, parrainage des nouveaux venus, etc...");
		$entity->setImage("1.jpg");
		$entity->setUrl("https://www.google.fr/");
		$entity->setActivated(true);
		$entity->setAuthor($em->merge($this->getReference('super-admin')));
		$em->persist($entity);
		
		$entity = new CarouselSlot();
		$entity->setTitle("A la decouverte de nouveaux horizons!");
		$entity->setContent("Envie d'aventure? Entrez dans le monde fantastique des terres super fantastiques!.");
		$entity->setImage("2.jpg");
		$entity->setUrl("http://www.twitter.com/");
		$entity->setActivated(true);
		$entity->setAuthor($em->merge($this->getReference('super-admin')));
		$em->persist($entity);
		
		$entity = new CarouselSlot();
		$entity->setTitle("Nature");
		$entity->setContent("bla bla bla");
		$entity->setImage("3.jpg");
		$entity->setUrl("https://www.google.fr/");
		$entity->setActivated(true);
		$entity->setAuthor($em->merge($this->getReference('admin-1')));
		$em->persist($entity);
		
		$entity = new CarouselSlot();
		$entity->setTitle("Darkness");
		$entity->setContent("Turn on the light");
		$entity->setImage("4.jpg");
		$entity->setUrl("https://www.google.fr/");
		$entity->setActivated(true);
		$entity->setAuthor($em->merge($this->getReference('admin-1')));
		$em->persist($entity);
		
		$em->flush();
	}
	
	public function getOrder()
	{
		return 11;
	}
}