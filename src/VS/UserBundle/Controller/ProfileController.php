<?php

namespace VS\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;

class ProfileController extends ContainerAware 
{

	/**
	 * Show the user
	 */
	public function mainShowAction() {
		$user = $this->container->get('security.context')->getToken()->getUser();
		if (!is_object($user) || !$user instanceof UserInterface) {
			throw new AccessDeniedException('This user does not have access to this section.');
		}

		return $this->container->get('templating')->renderResponse('VSUserBundle:Profile:main_show.html.' . $this->container->getParameter('fos_user.template.engine'), array('user' => $user));
	}

	public function mainEditAction() {
		$user = $this->container->get('security.context')->getToken()->getUser();
		$user->setPreviousImage($user->getImage());

		if (!is_object($user) || !$user instanceof UserInterface) {
			throw new AccessDeniedException('This user does not have access to this section.');
		}

		$form = $this->container->get('fos_user.profile.form');
		$formHandler = $this->container->get('fos_user.profile.form.handler');

		$process = $formHandler->process($user);
		if ($process) {
			$this->setFlash('fos_user_success', 'profile.flash.updated');
			return new RedirectResponse($this->getRedirectionUrl($user));
		}

		return $this->container->get('templating')->renderResponse(
				'VSUserBundle:Profile:main_edit.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView())
		);
	}

}