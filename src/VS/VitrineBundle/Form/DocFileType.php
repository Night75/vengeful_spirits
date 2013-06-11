<?php

namespace VS\VitrineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocFileType extends AbstractType {

	private $type;
	private $allowedTypes = array("image", "file", "simple");

	public function __construct($type) {
		if(!in_array($type, $this->allowedTypes)){
			throw new \UnexpectedValueException(sprintf("Le type %s est un invalide. Les type autorisés sont %s", $type, implode(", ", $this->allowedTypes)));
		}
		$this->type = $type;
	}

	public function buildForm(FormBuilderInterface $builder, array $options) {
		
		if($this->type == "image"){
			$builder->add('file_add', 'image', array("required" => false, "filename" => "file", "path" => "path", "no_label" => true));
		}
		elseif($this->type == "simple"){
			$builder->add('file_add', 'image', array("required" => false, "path" => "path", "filename" => "file","no_label" => true));
			$builder->add('file_delete', 'delete_box', array("label" => "Supprimer le fichier", "required" => false));
		}	
		$builder->add("updated_at", 'datetime', array('required' => 'false', "no_label" => true, "attr" => array("class" => "hidden",)))
		;
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
