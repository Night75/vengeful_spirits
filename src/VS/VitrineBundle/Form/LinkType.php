<?php

namespace VS\VitrineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use VS\VitrineBundle\Form\DocFileType;

class LinkType extends AbstractType
{
	protected $types = array("pdf", "lien", "video");
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add("type", "choice", array("choices" => $this->types , 'empty_value' => 'Veuillez choisir une option', "embedded_in_sonata" => true, "attr" => array("class" => "night-parent-list", "data-id" => "link-list")));
		$builder->add("url", "text", array("embedded_in_sonata" => true, "attr" => array("data-parent-id" => "link-list", "data-parent-option" => "lien") ));
		$builder->add("textButton", "text", array("embedded_in_sonata" => true, "attr" => array("data-parent-id" => "link-list", "data-parent-option" => "lien")));
		$builder->add('doc_files', new DocFileType("simple"), array("required" => false ,"embedded_in_sonata" => true, "attr" => array("data-parent-id" => "link-list", "data-parent-option" => "video-image")));
		$builder->add("updated_at", 'datetime', array('required' => 'false', "no_label" => true, "attr" => array("class" => "hidden",), "embedded_in_sonata" => true, ))
		;
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			 'data_class' => 'VS\VitrineBundle\Entity\Link'
		));
	}

	public function getName() {
		return 'vs_vitrinebundle_link_type';
	}

}
