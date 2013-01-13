<?php

namespace VS\VitrineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocFileType extends AbstractType
{
	private $allow_delete;
	
	public function __construct($allow_delete = false){
		$this->allow_delete = $allow_delete;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('file_add', 'file', array("required" => false, "filename" => "file", "no_label" => true));
		if($this->allow_delete ){
			$builder->add(	'file_delete','delete_box', array("label" => "Supprimer le fichier"));
		}
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
		'data_class' => 'VS\VitrineBundle\Entity\DocFile'
		));
	}

	public function getName() {
		return 'vs_vitrinebundle_docfile_type';
	}

}
