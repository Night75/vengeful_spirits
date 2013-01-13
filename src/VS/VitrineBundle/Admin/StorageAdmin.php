<?php

namespace VS\VitrineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use VS\VitrineBundle\Form\DocFileType;

class StorageAdmin extends Admin 
{
	protected $container;
	
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'ASC',
		'_sort_by' => 'title'
	);

	protected function configureFormFields(FormMapper $formMapper) 
	{
//		echo "lala";
//		$doc = $this->subject->getDocFiles();
//		var_dump($doc[0]);

		$mode = 1;
		//var_dump($this->subject);
		$formMapper	
			->add('title', "text")
			->add("doc_files", 'collection', array(
													'type' => new DocFileType($mode),
													'allow_add' => true,
													'allow_delete' => false,
													'by_reference' => false,
			))
//			->add('doc_files', 'sonata_type_collection',
//                  array('by_reference' => false ),
//                  array(
//					'edit' => 'inline',
//					'sortable' => 'pos',
//					'inline' => 'table',
//                  ))
		;
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {

		$datagridMapper
			->add('title')
		;
	}

	public function getFormTheme(){
		return array("VSVitrineBundle:Form:fields_admin.html.twig");
    }
		
	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
			->addIdentifier('title', null, array("label" => "Titre"))
				->add('_action', 'actions', array(
				'actions' => array(
					//'view' => array(),
					'edit' => array(),
					'delete' => array(),
			)))
		;
	}

	public function prePersist($object){
		$doc = $object->getDocFiles();

		foreach($doc as &$d){
			if(!$d->getFileAdd()){
				var_dump($d);
				$object->removeDocFile($d);
				var_dump($d);
				unset($d);
			}
		}
		var_dump($object->getDocFiles());
		echo "oooo"; exit;
		$this->getCustomManager()->preUpdate($object);	
	}
	
	public function preUpdate($object){
		$this->getCustomManager()->preUpdate($object);
		$this->printEmbed($object);
	}
	
	public function printEmbed($object){
		foreach($object->getDocFiles() as $doc){
			var_dump($doc);
		}
	}
	
	public function postRemove($object){
		$this->getCustomManager()->postRemove($object);
	}
	
	public function setContainer($container){
		$this->container = $container;
	}
	
	public function getCustomManager(){
		return $this->container->get("vs.vitrine.storage_manager");
	}
}