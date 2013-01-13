<?php

namespace VS\VitrineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VS\VitrineBundle\Entity\Article;
use VS\VitrineBundle\Form\ArticleType;
use VS\VitrineBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
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
		$em = $this->getDoctrine()->getManager();
		$query = $em->getRepository('VSVitrineBundle:Article')->getArticlesQuery();
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query, $page, $this->container->getParameter('vs.vitrine.max_articles_on_index'));

		return $this->render('VSVitrineBundle:Article:index.html.twig', array(
			'pagination' => $pagination,
			));
	}

	/**
	 * Finds and displays a Article entity.
	 *
	 */
	public function showAction($id) 
	{
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('VSVitrineBundle:Article')->find($id);
		
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Article entity.');
		}

		return $this->render('VSVitrineBundle:Article:show.html.twig', array(
			'article' => $entity,
		));
	}
	
	

	public function testAction($id)
	{
		var_dump($this->getRequest()->get("id")); exit;
		return new Response(var_dump($user));
	}
	
	
	  public function newAction()
	  {
	  $entity = new Article();
	  $form   = $this->createForm(new ArticleType(), $entity);

	  return $this->render('VSVitrineBundle:Article:new.html.twig', array(
	  'entity' => $entity,
	  'form'   => $form->createView(),
	  ));
	  }


	  public function createAction(Request $request)
	  {
	  $entity  = new Article();
	  $form = $this->createForm(new ArticleType(), $entity);
	  $form->bind($request);

	  if ($form->isValid()) {
	  $em = $this->getDoctrine()->getManager();
		echo "before";
	  $em->persist($entity);
		echo "between";
	  $em->flush();
		echo "after";
		exit;
	  return $this->redirect($this->generateUrl('article_show', array('id' => $entity->getId())));
	  }

	  return $this->render('VSVitrineBundle:Article:new.html.twig', array(
	  'entity' => $entity,
	  'form'   => $form->createView(),
	  ));
	  }

	  public function editAction($id)
	  {
	  $em = $this->getDoctrine()->getManager();

	  $entity = $em->getRepository('VSVitrineBundle:Article')->find($id);

	  if (!$entity) {
	  throw $this->createNotFoundException('Unable to find Article entity.');
	  }

	  $editForm = $this->createForm(new ArticleType(), $entity);
	  $deleteForm = $this->createDeleteForm($id);

	  return $this->render('VSVitrineBundle:Article:edit.html.twig', array(
	  'entity'      => $entity,
	  'edit_form'   => $editForm->createView(),
	  'delete_form' => $deleteForm->createView(),
	  ));
	  }


	  public function updateAction(Request $request, $id)
	  {
	  $em = $this->getDoctrine()->getManager();

	  $entity = $em->getRepository('VSVitrineBundle:Article')->find($id);

	  if (!$entity) {
	  throw $this->createNotFoundException('Unable to find Article entity.');
	  }

	  $deleteForm = $this->createDeleteForm($id);
	  $editForm = $this->createForm(new ArticleType(), $entity);
	  $editForm->bind($request);

	  if ($editForm->isValid()) {
			echo "before";
	 // $em->persist($entity);
		echo "betweeen";
	  $em->flush();
		echo "after"; exit;

	  return $this->redirect($this->generateUrl('article_edit', array('id' => $id)));
	  }

	  return $this->render('VSVitrineBundle:Article:edit.html.twig', array(
	  'entity'      => $entity,
	  'edit_form'   => $editForm->createView(),
	  'delete_form' => $deleteForm->createView(),
	  ));
	  }


	  public function deleteAction(Request $request, $id)
	  {
	  $form = $this->createDeleteForm($id);
	  $form->bind($request);

	  if ($form->isValid()) {
	  $em = $this->getDoctrine()->getManager();
	  $entity = $em->getRepository('VSVitrineBundle:Article')->find($id);

	  if (!$entity) {
	  throw $this->createNotFoundException('Unable to find Article entity.');
	  }

	  $em->remove($entity);
	  $em->flush();
	  }

	  return $this->redirect($this->generateUrl('article'));
	  }

	  private function createDeleteForm($id)
	  {
	  return $this->createFormBuilder(array('id' => $id))
	  ->add('id', 'hidden')
	  ->getForm()
	  ;
	  }
	
}
