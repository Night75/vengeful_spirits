<?php

namespace VS\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var date $birthday
	 *
	 * @ORM\Column(name="birthday", type="date")
	 * @Assert\Date()
	 */
	protected $birthday;

	/**
	 * @var string $signature
	 *
	 * @ORM\Column(name="signature",type="string", length=255,nullable=true)
	 */
	protected $signature;

	/**
	 * @var string $gender
	 *
	 * @ORM\Column(name="gender",type="string",length=255)
	 * @Assert\Choice({"m", "f"})
	 */
	protected $gender;

	/**
	 * @var string $avatar
	 *
	 * @ORM\Column(name="avatar",type="string",length=255, nullable=true)
	 */
	protected $avatar;

	/**
	 * @var datetime $register_date
	 *
	 * @ORM\Column(name="register_date",type="datetime", nullable=false)
	 */
	protected $register_date;

	/**
	 * @var datetime $updated_at
	 *
	 * @ORM\Column(name="updated_at",type="datetime", nullable=true)
	 */
	protected $updated_at;
	
	/**
	 *
	 * @var type 
	 * @Assert\File(maxSize="6000000")
	 */
	protected $avatar_add;
	protected $avatar_delete;
	
	protected $uploadDir = 'uploads/users';

	public function __construct() {
		$this->register_date = new \Datetime();
		parent::__construct();
	}

	public function __toString(){
		return $this->username;
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
	 * Set birthday
	 *
	 * @param \DateTime $birthday
	 * @return User
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;

		return $this;
	}

	/**
	 * Get birthday
	 *
	 * @return \DateTime 
	 */
	public function getBirthday() {
		return $this->birthday;
	}
	
	public function getAvatarFile() {
		return $this->avatar_file;
	}

	public function setAvatarFile($avatar_file) {
		$this->avatar_file = $avatar_file;
	}

		/**
	 * Set signature
	 *
	 * @param string $signature
	 * @return User
	 */
	public function setSignature($signature) {
		$this->signature = $signature;

		return $this;
	}

	/**
	 * Get signature
	 *
	 * @return string 
	 */
	public function getSignature() {
		return $this->signature;
	}

	/**
	 * Set gender
	 *
	 * @param string $gender
	 * @return User
	 */
	public function setGender($gender) {
		$this->gender = $gender;

		return $this;
	}

	/**
	 * Get gender
	 *
	 * @return string 
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Set register_date
	 *
	 * @param \DateTime $registerDate
	 * @return User
	 */
	public function setRegisterDate($registerDate) {
		$this->register_date = $registerDate;

		return $this;
	}

	/**
	 * Get register_date
	 *
	 * @return \DateTime 
	 */
	public function getRegisterDate() {
		return $this->register_date;
	}

	/**
	 * Set avatar
	 *
	 * @param string $avatar
	 * @return User
	 */
	public function setAvatar($avatar) {
		$this->avatar = $avatar;

		return $this;
	}

	/**
	 * Get avatar
	 *
	 * @return string 
	 */
	public function getAvatar() {
		return $this->avatar;
	}

	public function getUpdatedAt() {
		return $this->updated_at;
	}

	public function setUpdatedAt($updated_at) {
		$this->updated_at = $updated_at;
	}

	public function getAvatarAdd() {
		return $this->avatar_add;
	}

	public function setAvatarAdd($avatar_add) {
		$this->avatar_add = $avatar_add;
	}

	public function getAvatarDelete() {
		return $this->avatar_delete;
	}

	public function setAvatarDelete($avatar_delete) {
		$this->avatar_delete = $avatar_delete;
	}


}