<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $builder
            ->add('username',"text", array('label' => 'Nom d\'utilisateur','required' => true, ))
            ->add('email', 'email', array('error_bubbling'=>false))
			->add('gender', 'gender', array('empty_value' => "Veuillez choisir votre civilité"))
			->add('birthday','birthday',array(
					'label' => 'Date de naissance',
					'format' => 'dd-MM-yyyy',
					'years' => range(date("Y")-60,date("Y")-12)
			))
			->add( 'plainPassword', 'repeated', array(
				'type' => 'password', 
				'invalid_message' => 'Les deux champs de mot de passe doivent correspondre',
				'first_options' => array('label' => 'Mot de passe'),
				'second_options' => array('label' => 'Confirmation du mot de passe')
			))
			 ->add("signature","textarea", array("required" => false))
		 	->add("avatar_add","file", array("required" => false))
			//->add('captcha', 'captcha', array("invalid_message" => "Erreur dans le captcha"));
			
           /* ->add('plainPassword', 'repeated', 
											            array('type' => 'password',
											            "first_name" => "Mot de passe", 
											            "second_name" => "confirmation du mot de passe" ,
											            "invalid_message" => "Les mots de passes sont differents",
											             'error_bubbling' => false))*/;
    }

    public function getName()
    {
        return 'vs_user_registration';
    }
}
