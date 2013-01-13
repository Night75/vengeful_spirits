<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends BaseAdmin 
{
	protected $container;

		
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'DESC',
		'_sort_by' => 'updated_at'
	);

	protected function configureFormFields(FormMapper $formMapper) 
	{
		$formMapper
			->add('title')
			->add('content')
			;
		
		// ====== Ajout du/des champs images
		$formMapper->add("image_add", "file", array("label" => "Image", "required" => false, "filename" => "image",	));	
		if(isset($this->subject) && $this->subject->getImage()){
			$formMapper->add('image_delete', 'delete_box', array("label" => "Supprimer le fichier","required" => false));
		}	
	}	
		
	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
		$datagridMapper
			->add('title')
			->add('content')
		;
	}
	 
	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
			->addIdentifier('title', null, array("label" => "Titre"))
			->add('author',"string", array("label" => "Auteur"))
			->add("created_at", null, array("label" => "Date de creation"))
			->add("updated_at", null, array("label" => "Date de modification"))
			->add("image", null, array("template" => "NightAdminBundle:CRUD:list_image.html.twig"))
			->add('_action', 'actions', array(
						'actions' => array(
							//'view' => array(),
							'edit' => array(),
							'delete' => array(),
						)))
		;
	}
}