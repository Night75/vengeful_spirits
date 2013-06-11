<?php

namespace VS\VitrineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VS\VitrineBundle\Entity\Article;
use VS\VitrineBundle\Form\ArticleType;
use VS\VitrineBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use VS\VitrineBundle\Entity\DocFile;
use VS\VitrineBundle\Form\DocFileType;

/**
 * Article controller.
 *
 */
class DocFileController extends Controller
{

	/**
	 * Lists all Article entities.
	 *
	 */
	public function indexAction() 
	{
		$entity = new DocFile();
		$formType = new DocFileType(true);
		$form = $this->createForm($formType, $entity);
		
		return $this->render('VSVitrineBundle:DocFile:index.html.twig', array(
				'form' => $form->createView(),
			));
	}
}