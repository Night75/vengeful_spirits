<?php

namespace VS\VitrineBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
		
use VS\VitrineBundle\Entity\Survey;
use VS\VitrineBundle\Entity\SurveyAnswer;

class LoadSurveyData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
		$entity = new Survey();
		$entity->setQuestion("Avez vous peur des démons?");
		$entity->addSurveyAnswer(new SurveyAnswer("Oui, j'en ai peur.", 8));
		$entity->addSurveyAnswer(new SurveyAnswer("Non, mais j'ai peur des fantomes..", 52));
		$entity->addSurveyAnswer(new SurveyAnswer("Non, pas du tout", 17));
		$entity->addSurveyAnswer(new SurveyAnswer("Ca depend des jours.", 42));
		$entity->setAuthor($em->merge($this->getReference("super-admin")));
		$em->persist($entity);
		
		
		$em->flush();
	}
	
	
	public function getOrder() {
		return 14;
	}
}