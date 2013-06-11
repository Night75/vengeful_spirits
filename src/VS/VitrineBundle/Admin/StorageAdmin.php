<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use VS\VitrineBundle\Form\DocFileType;

class StorageAdmin extends BaseAdmin {

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
				->add('storageType', 'sonata_type_model',
							array(
								 'label' => 'type',
								 'by_reference' => true,
								 'empty_value' => 'Choose an option',
							))
				  ->add("doc_files", 'collection', array(
						"label" => "Images",
						'type' => new DocFileType("image"),
						'allow_add' => true,
						'allow_delete' => true,
						'by_reference' => false,
				  ))
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
		$this->getCustomManager()->loadPreviousEntity($this->subject);
	}

	public function removeThat() {
		$entity = $this->subject;
		$entity->setTitle(time());
		$docFiles = $entity->getDocFiles()->toArray();
		$entity->removeDocFile($docFiles[0]);
		$this->getModelManager()->update($entity);
	}

}