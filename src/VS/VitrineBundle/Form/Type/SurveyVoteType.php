<?php

namespace VS\VitrineBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyVoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('survey_vote', 'entity', array(
							"required" => true, 
							"expanded"=> true,
							"property" => "content", 
							"class" => "VSVitrineBundle:SurveyAnswer"
				))	
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VS\VitrineBundle\Entity\Survey'
        ));
    }

    public function getName()
    {
        return 'vs_vitrinebundle_survey_vote_type';
    }
}
