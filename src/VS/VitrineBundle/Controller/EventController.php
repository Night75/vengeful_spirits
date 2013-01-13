<?php

namespace VS\VitrineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Article controller.
 *
 */
class EventController extends Controller
{

	public function render($view, array $parameters = array(), Response $response = null, $resetParent = false) {
		if(!$resetParent){
			$parameters['formLogin'] = $this->forward("VSUserBundle:Security:login", array("request" => $this->getRequest(), "isWidget"=> true))->getContent();
		}
		return parent::render($view, $parameters);
	}
	
	/**
	 * Lists all Article entities.
	 *
	 */
	public function indexAction($page) 
	{
		$eventManager = $this->get("vs.vitrine.event_manager");
		$eventsGroups = $eventManager->getCurrentEventsOrdered();
		
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($eventsGroups, $page, $this->container->getParameter('max_events_on_event_list'));

		return $this->render('VSVitrineBundle:Event:index.html.twig', array(
				'eventsGroup' => $pagination,
			));
	}
}
