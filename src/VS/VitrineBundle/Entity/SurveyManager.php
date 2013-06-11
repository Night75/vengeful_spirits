<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Night\CommonBundle\Doctrine\BaseManager;

class SurveyManager extends BaseManager {

    public function prePersist($entity, $recursive = true) {
        parent::prePersist($entity, $recursive);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity->setAuthor($user);
    }

    public function vote($surveyAnswer) {
        $votes = $surveyAnswer->getTotalVotes() + 1;
        $surveyAnswer->setTotalVotes($votes);
        $this->objectManager->flush();
    }

}