<?php

namespace VS\VitrineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class DocFileAdmin extends Admin 
{

	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'ASC',
		'_sort_by' => 'file'
	);

	protected function configureFormFields(FormMapper $formMapper) 
	{
		// ====== Ajout du/des champs images
		$formMapper->add("file_add", "file", array("label" => "Fichier", "required" => false,"data_class" => null));	
		if(isset($this->subject) && $this->subject->getImage()){
			$formMapper->add('file_delete', 'checkbox', array('label' => "Fichier chargé","for_delete" => "file", "required" => false));
		}	
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {

		$datagridMapper
			->add('file')
		;
	}

	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
			->addIdentifier('file', null, array("label" => "Nom"))

		;
	}

	public function prePersist($object){
		$this->getCustomManager()->preUpdate($object);
	}
	
	public function preUpdate($object){
		$this->getCustomManager()->preUpdate($object);
	}
	
	public function postRemove($object){
		$this->getCustomManager()->postRemove($object);
	}
	
	public function setContainer($container){
		$this->container = $container;
	}
	
	public function getCustomManager(){
		return $this->container->get("vs.vitrine.doc_file_manager");
	}
}