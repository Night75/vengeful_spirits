<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use VS\VitrineBundle\Form\LinkType;

class StorageUniqueAdmin extends BaseAdmin {

	protected $container;
	// setup the default sort column and order
	protected $datagridValues = array(
		 '_sort_order' => 'ASC',
		 '_sort_by' => 'title'
	);
	 
	protected function configureFormFields(FormMapper $formMapper) {
		$this->preConfigureForm();

		//$this->removeThat();
		$formMapper
				  ->add('title', "text")->setHelps(array(
							'title' => "Ceci est l'aide"
						))
				  
				  ->add("link", new LinkType())
				  ;
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

	public function update($object) {
		$this->preUpdate($object);
		$this->getModelManager()->update($object);
		$this->postUpdate($object);
	}

	public function setContainer($container) {
		$this->container = $container;
	}

	public function getCustomManager() {
		return $this->container->get("vs.vitrine.storage_manager");
	}

	public function preConfigureForm() {
		//$this->getCustomManager()->loadPreviousEntity($this->subject);
		//$this->container->get("vs.vitrine.doc_file_manager")->loadPreviousEntity($this->subject->getDocFiles());
	}

	public function removeThat() {
		$entity = $this->subject;
		$entity->setTitle(time());
		$docFiles = $entity->getDocFiles()->toArray();
		$entity->removeDocFile($docFiles[0]);
		$this->getModelManager()->update($entity);
	}

}