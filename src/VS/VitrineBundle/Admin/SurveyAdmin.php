<?php

namespace VS\VitrineBundle\Admin;

use Night\AdminBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use VS\VitrineBundle\Form\Type\SurveyAnswerType;

class SurveyAdmin extends BaseAdmin {

    protected $container;
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'updated_at'
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $this->preConfigureForm();

        $formMapper
                ->add('question')
                ->add("survey_answers", "collection", array(
                    "label" => "Réponses",
                    "type" => new SurveyAnswerType(),
                    "allow_add" => true,
                    "allow_delete" => true,
                    "by_reference" => false,
                ))
                ->add("updated_at", 'datetime', array('required' => 'false', "attr" => array("class" => "hidden")))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('question')

        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('question', null, array("label" => "Question"))
                ->add("author", "text", array("label" => "Auteur"))
                ->add("created_at", null, array("label" => "Date de creation"))
                ->add("updated_at", null, array("label" => "Date de modification"))
                ->add("total_votes", null, array("label" => "Total des votes"))
                ->add('_action', 'actions', array(
                    'actions' => array(
                        //'view' => array(),
                        'edit' => array(),
                        'delete' => array(),
                        )))
        ;
    }

    public function update($object) {
        $this->preUpdate($object);
        $this->getModelManager()->update($object);
        $this->postUpdate($object);
    }

    public function removeThat() {
        $entity = $this->subject;
        $entity->setQuestion(time());
        $embed = $entity->getSurveyAnswers()->toArray();
        $entity->removeSurveyAnswer($embed[0]);
        $this->getModelManager()->update($entity);
    }
}