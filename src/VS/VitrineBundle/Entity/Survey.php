<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Survey
 */
class Survey {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $question;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 */
	private $survey_answers;

    /**
     * @var \VS\UserBundle\Entity\User
     */
    private $author;


	/**
	 * @var \DateTime
	 */
	private $created_at;

	/**
	 * @var \DateTime
	 */
	private $updated_at;

	private $survey_vote;
	
	private $total_votes;
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->created_at = new \Datetime();
		$this->updated_at = new \Datetime();
		$this->survey_answers = new \Doctrine\Common\Collections\ArrayCollection();
		$this->total_votes = 0;
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set question
	 *
	 * @param string $question
	 * @return Survey
	 */
	public function setQuestion($question) {
		$this->question = $question;

		return $this;
	}

	/**
	 * Get question
	 *
	 * @return string 
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * Set created_at
	 *
	 * @param \DateTime $createdAt
	 * @return Survey
	 */
	public function setCreatedAt($createdAt) {
		$this->created_at = $createdAt;

		return $this;
	}

	/**
	 * Get created_at
	 *
	 * @return \DateTime 
	 */
	public function getCreatedAt() {
		return $this->created_at;
	}

	/**
	 * Set updated_at
	 *
	 * @param \DateTime $updatedAt
	 * @return Survey
	 */
	public function setUpdatedAt($updatedAt) {
		$this->updated_at = $updatedAt;

		return $this;
	}

	/**
	 * Get updated_at
	 *
	 * @return \DateTime 
	 */
	public function getUpdatedAt() {
		return $this->updated_at;
	}

	/**
	 * Add survey_answers
	 *
	 * @param \VS\VitrineBundle\Entity\SurveryAnswer $surveyAnswers
	 * @return Survey
	 */
	public function addSurveyAnswer(\VS\VitrineBundle\Entity\SurveyAnswer $surveyAnswers) {
		$this->survey_answers[] = $surveyAnswers;
		$surveyAnswers->setSurvey($this);
		return $this;
	}

	/**
	 * Remove survey_answers
	 *
	 * @param \VS\VitrineBundle\Entity\SurveryAnswer $surveyAnswers
	 */
	public function removeSurveyAnswer(\VS\VitrineBundle\Entity\SurveyAnswer $surveyAnswers) {
		$this->survey_answers->removeElement($surveyAnswers);
	}

	/**
	 * Get survey_answers
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getSurveyAnswers() {
		return $this->survey_answers;
	}

    /**
     * Set author
     *
     * @param \VS\UserBundle\Entity\User $author
     * @return Survey
     */
    public function setAuthor(\VS\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \VS\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
		
	public function getTotalVotes() {
		$totalVotes = 0;
		foreach($this->getSurveyAnswers() as $answer){
			$totalVotes += $answer->getTotalVotes();
		}
		return $totalVotes;
	}

	public function getSurveyVote() {
		return $this->survey_vote;
	}

	public function setSurveyVote($survey_vote) {
		$this->survey_vote = $survey_vote;
	}


}