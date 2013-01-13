<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends BaseAdmin 
{
	protected $container;
	
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'DESC',
		'_sort_by' => 'updated_at'
	);

	protected function configureFormFields(FormMapper $formMapper) 
	{
		// === Date par defaut mise a celle d'aujourd'hui
		if(!$this->subject->getId()){
			$this->subject->setEventDate(new \Datetime());
		}
		
		$formMapper
			->add('title', null, array("label" => "Titre"))
			->add('description',  null, array("label" => "Description"))
			->add("event_date",  null, array("label" => "Date de l'évènement"))
			->add("updated_at", 'datetime', array('required' => 'false', "attr" => array("class" => "hidden") ))
			;
	}
		
	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
		$datagridMapper
			->add('title')
			->add('created_at')
		;
	}

	
	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
			->addIdentifier('title', null, array("label" => "Titre"))
			->add("author", "text", array("label" => "Auteur"))
			->add("created_at", null, array("label" => "Date de creation"))
			->add("event_date", null, array("label" => "Date de l'éveènement"))
			->add('_action', 'actions', array(
						'actions' => array(
							//'view' => array(),
							'edit' => array(),
							'delete' => array(),
						)))
		;
	}
}