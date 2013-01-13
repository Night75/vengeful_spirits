<?php

namespace VS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyAnswer
 */
class SurveyAnswer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var integer
     */
    private $total_votes;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

	/**
     * @var \VS\VitrineBundle\Entity\Survey
     */
    private $survey;

	public function __construct($content = null, $total_votes = 0){
		$this->content = $content;
		$this->total_votes = $total_votes;
		$this->created_at = new \Datetime();
		$this->updated_at = new \Datetime();
	}
	
	public function __toString(){
		return $this->content;
	}
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return SurveyAnswer
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set total_votes
     *
     * @param integer $totalVotes
     * @return SurveyAnswer
     */
    public function setTotalVotes($totalVotes)
    {
        $this->total_votes = $totalVotes;
    
        return $this;
    }

    /**
     * Get total_votes
     *
     * @return integer 
     */
    public function getTotalVotes()
    {
        return $this->total_votes;
    }


    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return SurveyAnswer
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return SurveyAnswer
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

  
    /**
     * Set survey
     *
     * @param \VS\VitrineBundle\Entity\Survey $survey
     * @return SurveyAnswer
     */
    public function setSurvey(\VS\VitrineBundle\Entity\Survey $survey = null)
    {
        $this->survey = $survey;
    
        return $this;
    }

    /**
     * Get survey
     *
     * @return \VS\VitrineBundle\Entity\Survey 
     */
    public function getSurvey()
    {
        return $this->survey;
    }

	
}