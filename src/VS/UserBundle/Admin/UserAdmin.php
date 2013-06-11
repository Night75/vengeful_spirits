<?php

namespace VS\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin {

	protected $container;
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'DESC',
		'_sort_by' => 'updated_at'
	);
	
	protected $roles = array(
		"ROLE_ADMIN" => "ROLE_ADMIN",
		"ROLE_USER" => "ROLE_USER",
	);
		
	protected function configureFormFields(FormMapper $formMapper) {

		$formMapper->add('username', "text", array('label' => 'Nom d\'utilisateur', 'required' => true,));

		$requiredPassword = ($this->subject->getId()) ? false : true;
		$formMapper->add('plainPassword', "password", array('label' => "Mot de passe", 'required' => $requiredPassword,));
		
		$formMapper->add('email', 'email', array('error_bubbling' => false))
			->add('gender', 'gender', array('empty_value' => "Veuillez choisir votre civilité"))
			->add('birthday', 'birthday', array(
				'label' => 'Date de naissance',
				'format' => 'dd-MM-yyyy',
				'years' => range(date("Y") - 60, date("Y") - 12)
			))
			->add("signature", "textarea", array("required" => false))
			->add("roles", "choice", array("choices" => $this->roles, "multiple" => true ))
			;
		
		$formMapper->add("avatar_add", "file", array("label" => "Avatar" ,"required" => false, "filename" => "avatar"));
			if(isset($this->subject) && $this->subject->getAvatar()){
				$formMapper->add('avatar_delete', 'delete_box', array("label" => "Supprimer le fichier","required" => false));
			}	

	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
		$datagridMapper
			->add('username')
			->add('gender')
		;
	}

	protected function configureListFields(ListMapper $listMapper) {
		$listMapper
			->addIdentifier("id")
			->add("username", null, array("label" => "Pseudo"))
			->add("register_date", null, array("label" => "Date d'inscription"))
			->add("roles", null, array("label" => "Role", "template" => "NightAdminBundle:CRUD:list_roles.html.twig"))
			->add("avatar", null, array("template" => "NightAdminBundle:CRUD:list_image.html.twig"))
			->add('_action', 'actions', array(
							'actions' => array(
							//'view' => array(),
							'edit' => array(),
							'delete' => array(),
						)))
		;
	}

	public function prePersist($user) {
		$this->preUpdate($user);
	}
	
	public function preUpdate($user) {
		$this->getUserManager()->updateUser($user, false);
	}

	public function setContainer($container) {
		$this->container = $container;
	}

	public function getUserManager() {
		return $this->container->get("fos_user.user_manager");
	}

	public function getPathImages(){
		return "/vengeful-spirits/" .$this->container->get("fos_user.user_manager")->getUploadDir() ."/";
	}
}