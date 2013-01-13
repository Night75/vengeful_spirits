<?php

namespace VS\VitrineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class SurveyController extends Controller
{
	
	public function render($view, array $parameters = array(), Response $response = null, $resetParent = false) {
		if(!$resetParent){
			$parameters['formLogin'] = $this->forward("VSUserBundle:Security:login", array("request" => $this->getRequest(), "isWidget"=> true))->getContent();
		}
		return parent::render($view, $parameters);
	}
	
	
	public function indexAction($page)
	{
		$surveyManager = $this->get("vs.vitrine.survey_manager");
		$surveys = $surveyManager->findAll();
		
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($surveys, $page, $this->container->getParameter('max_surveys_on_survey_list'));

		return $this->render('VSVitrineBundle:Survey:index.html.twig', array(
				'surveys' => $pagination,
			));
	}
	
	public function widgetAction()
	{
		if(!$this->getRequest()->getSession()->get("has_voted")){
			return $this->voteAction();
		} else {
			return $this->resultAction();
		}
	}
	
	public function voteAction()
	{
		$manager = $this->get("vs.vitrine.survey_manager");
		
		$survey = $manager->getLastSurvey();
		$form = $this->createForm($this->get("vs.vitrine.survey_vote_type"));
		
		if ($this->getRequest()->getMethod() == 'POST' && $this->getRequest()->get($form->getName())) {
			
			$form->bind($this->get("request"));
			if($form->isValid()){
				$survey = $form->getData();
				$manager->vote($survey->getSurveyVote());
				$this->getRequest()->getSession()->set("has_voted", true);
				return $this->resultAction($survey);
			}
		}
		
		return $this->render("VSVitrineBundle:Survey:_widget_vote.html.twig", array(
					"survey" => $survey,
					"form" => $form->createView(),
				),
				null,
				true
		);
	}
	
	
	public function resultAction($survey = null){
		if($survey === null){
			$manager = $this->get("vs.vitrine.survey_manager");		
			$survey = $manager->getLastSurvey();
		}
		
		return $this->render("VSVitrineBundle:Survey:_widget_results.html.twig",array(
				"survey" => $survey
			),
			null, 
			true
		);
	}
	
}