<?php

namespace VS\VitrineBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Util\PropertyPath;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CheckboxTypeExtension extends AbstractTypeExtension {

	/**
	 * Returns the name of the type being extended.
	 *
	 * @return string The name of the type being extended
	 */
	public function getExtendedType() {
		return 'checkbox';
	}

	/**
	 * Add the image_path option
	 *
	 * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setOptional(array('for_delete'));
	}

	/**
	 * Pass the image url to the view
	 *
	 * @param \Symfony\Component\Form\FormView $view
	 * @param \Symfony\Component\Form\FormInterface $form
	 * @param array $options
	 */
	public function buildView(FormView $view, FormInterface $form, array $options) {


		if (array_key_exists('for_delete', $options)) {
			$parentData = $form->getParent()->getData();
				
			if (null !== $parentData) {
				// Le constructeur de PropertyPath n'accepte que des chaines de caracteres
				if(!is_string($options['for_delete'])){
					throw new \UnexpectedValueException(sprintf(
						"La valeur attribuée à l'option for_delete doit être une proprété de l'entité %s.", get_class($parentData)
					));
				} 
			
				try{		
					$propertyPath = new PropertyPath($options['for_delete']);
					$value = $propertyPath->getValue($parentData);
				}
				catch(\Exception $e){
					throw new \UnexpectedValueException(sprintf(
						"La valeur attribuée à l'option doit être une proprété de l'entité %s.", get_class($parentData)
					));
				}	
			} else {
				$value = null;
			}

			// set an "image_url" variable that will be available when rendering this field
			$view->set('for_delete', $value);
		}
	}

}