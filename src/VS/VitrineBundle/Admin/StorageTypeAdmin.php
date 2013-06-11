<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use VS\VitrineBundle\Form\DocFileType;

class StorageTypeAdmin extends BaseAdmin {

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
				  ->add('type', "text")->setHelps(array(
							'title' => "Ceci est l'aide"
						))
		;
	}
	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
				->add("type")
				 ;
	}
	
	public function preUpdate($object) {
		var_dump($object); exit;
	}
}