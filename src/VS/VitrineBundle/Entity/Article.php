<?php

namespace VS\VitrineBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 */
class Article {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @var \DateTime
	 */
	private $created_at;

	/**
	 * @var \DateTime
	 */
	private $updated_at;

	/**
	 * @var string
	 */
	private $image;

	/**
	 * @Assert\File(maxSize = "1024k")
	 */
	private $image_add;
	private $image_delete;

    /**
     * @var \VS\UserBundle\Entity\User
     */
    private $author;
		
	public function __construct(){
		$this->created_at = new \Datetime();
		$this->updated_at = new \Datetime();
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
	 * Set title
	 *
	 * @param string $title
	 * @return Article
	 */
	public function setTitle($title) {
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set content
	 *
	 * @param string $content
	 * @return Article
	 */
	public function setContent($content) {
		$this->content = $content;

		return $this;
	}

	/**
	 * Get content
	 *
	 * @return string 
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Set created_at
	 *
	 * @param \DateTime $createdAt
	 * @return Article
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
	 * @return Article
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
	 * Set image
	 *
	 * @param string $image
	 * @return Article
	 */
	public function setImage($image) {
		$this->image = $image;

		return $this;
	}

	/**
	 * Get image
	 *
	 * @return string 
	 */
	public function getImage() {
		return $this->image;
	}
	
	public function getImageAdd() {
		return $this->image_add;
	}

	public function setImageAdd($image_add) {
		$this->image_add = $image_add;
	}

	public function getImageDelete() {
		return $this->image_delete;
	}

	public function setImageDelete($image_delete) {
		$this->image_delete = $image_delete;
	}



    /**
     * Set author
     *
     * @param \VS\UserBundle\Entity\User $author
     * @return Article
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
}