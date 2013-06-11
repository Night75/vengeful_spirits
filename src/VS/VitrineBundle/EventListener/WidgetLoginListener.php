<?php

namespace VS\VitrineBundle\EventListener;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

use VS\VitrineBundle\Controller\WidgetLoginController;

class WidgetLoginListener
{
	protected $container;
	
	public function __construct($container){
		$this->container = $container;
	}
	
	public function onKernelController(FilterControllerEvent $event) {
		$controller = $event->getController();
		/*
		 * $controller passed can be either a class or a Closure. This is not usual in Symfony2 but it may happen.
		 * If it is a class, it comes in array format
		 */
		if (!is_array($controller)) {
			return;
		}

		if ($controller[0] instanceof WidgetLoginController) {
		
			//$this->container->get('twig')->addGlobal('loginForm', $loginForm);
		}
		
	}

		
}