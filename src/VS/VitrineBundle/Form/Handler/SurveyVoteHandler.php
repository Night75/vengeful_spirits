<?php

namespace VS\VitrineBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use VS\VitrineBundle\Form\Type\SurveyVoteType;

class SurveyVoteHandler {

	protected $request;
	protected $manager;
	protected $form;

	public function __construct($form, SurveyVoteType $formType, ContainerInterface $container, $manager) {
		$this->form = $form->create($formType);
		$this->request = $container->get("request");
		$this->manager = $manager;
	}

	/**
	 * @param boolean $confirmation
	 */
	public function process() {

		var_dump($this->request->getContent());
		exit;
		if ('POST' === $this->request->getMethod()) {
			$this->form->bind($this->request);

			if ($this->form->isValid()) {
				$this->onSuccess($user, $confirmation);

				return true;
			}
		}

		return false;
	}

	/**
	 * @param boolean $confirmation
	 */
	protected function onSuccess(UserInterface $user, $confirmation) {
		if ($confirmation) {
			$user->setEnabled(false);
			if (null === $user->getConfirmationToken()) {
				$user->setConfirmationToken($this->tokenGenerator->generateToken());
			}

			$this->mailer->sendConfirmationEmailMessage($user);
		} else {
			$user->setEnabled(true);
		}
	}

}
