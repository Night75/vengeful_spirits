<?php

namespace VS\VitrineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class VitrineController extends Controller 
{

	/**
	 * @param string   $view
	 * @param array    $parameters
	 * @param Response $response
	 *
	 * @return Response
	 */
	public function render($view, array $parameters = array(), Response $response = null, $resetParent = false) {
		if(!$resetParent){
			$parameters['formLogin'] = $this->forward("VSUserBundle:Security:myLogin", array("isWidget"=> true))->getContent();
		}
		return parent::render($view, $parameters);
	}

	public function indexAction() {
		$articleManager = $this->get("vs.vitrine.article_manager");
		$articles = $articleManager->getLatestArticles($this->container->getParameter("max_articles_on_index"));

		$carouselSlotsManager = $this->get("vs.vitrine.carousel_slot_manager");
		$carouselSlots = $carouselSlotsManager->getActiveCarouselSlots();

		$eventManager = $this->get("vs.vitrine.event_manager");
		$eventsGroups = $eventManager->getCurrentEventsOrdered();

		$surveyTemplate = $this->forward("VSVitrineBundle:Survey:widget");
		// var_dump($surveyTemplate); exit;
		return $this->render('VSVitrineBundle:Vitrine:index.html.twig', array(
			"carouselSlots" => $carouselSlots,
			"articles" => $articles,
			"eventsGroups" => $eventsGroups,
			"surveyTemplate" => $surveyTemplate->getContent()
			));
	}

	public function sendFormAction() {
		return $this->render('VSVitrineBundle:Vitrine:sendform.html.twig', array());
	}

	public function processAjaxAction() {
		$response = new Response();
		$response->headers->set('Content-Type', 'application/json');
		$response->setStatusCode(200);

		sleep(2);
//		if ($request->getMethod() == 'POST') {	
//    		$form->bindRequest($request);
//    		if ($form->isValid()) {
//				$oContact = $form->getData();
//				$contactManager = $this->get("contact_manager");
//				$successSend = $contactManager->send($from, $to, $oContact);
		$successSend = true;


		if ($successSend) {
			$response->setContent(json_encode(array(
				"responseCode" => 200,
				"message" => "Votre message a été envoyé avec succès.")
				));
		}
		$response->setContent(json_encode(array(
			"responseCode" => 409,
			"message" => "Un problème innatendu est survenu. Veuillez essayer de nous transmettre votre message ultérieurement."
			)));
//			}
//			$errors = array();
//			foreach($form->getErrors() as $error){
//				$errors[] = $error->getMessageTemplate();
//			}
		$errors = array("erreur 1", "erreur 2", "erreur 3");
		$response->setContent(json_encode(array(
			"responseCode" => 400,
			"errors" => $errors,
			)));

		return $response;
	}

}
