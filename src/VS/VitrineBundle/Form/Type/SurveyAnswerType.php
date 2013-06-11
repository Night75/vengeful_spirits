<?php

namespace VS\VitrineBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyAnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', "text", array("no_sublabel" => true))
            ->add("updated_at", 'datetime', array('required' => 'false', "no_label" => true,  "attr" => array("class" => "hidden",) ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VS\VitrineBundle\Entity\SurveyAnswer'
        ));
    }

    public function getName()
    {
        return 'vs_vitrinebundle_survey_answer_type';
    }
}
