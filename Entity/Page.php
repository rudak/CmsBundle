<?php

namespace Rudak\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="rudak_cms_page")
 * @ORM\Entity(repositoryClass="Rudak\CmsBundle\Entity\PageRepository")
 */
class Page
{

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=150)
	 */
	private $name;


	/**
	 * @ORM\ManyToOne(targetEntity="Rudak\UserBundle\Entity\User")
	 */
	private $author;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="content", type="text")
	 */
	private $content;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="createdAt", type="datetime")
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="lastModifiedAt", type="datetime",nullable=true)
	 */
	private $lastModifiedAt;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="public", type="boolean",nullable=true)
	 */
	private $public;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="hit", type="integer")
	 */
	private $hit;

	public function __construct()
	{
		$this->hit = 0;
	}

	public function __toString()
	{
		return $this->name;
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
	 * Set name
	 *
	 * @param string $name
	 * @return Page
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set content
	 *
	 * @param string $content
	 * @return Page
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
	 * Set createdAt
	 *
	 * @param \DateTime $createdAt
	 * @return Page
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get createdAt
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set lastModifiedAt
	 *
	 * @param \DateTime $lastModifiedAt
	 * @return Page
	 */
	public function setLastModifiedAt($lastModifiedAt)
	{
		$this->lastModifiedAt = $lastModifiedAt;

		return $this;
	}

	/**
	 * Get lastModifiedAt
	 *
	 * @return \DateTime
	 */
	public function getLastModifiedAt()
	{
		return $this->lastModifiedAt;
	}

	/**
	 * Set public
	 *
	 * @param boolean $public
	 * @return Page
	 */
	public function setPublic($public)
	{
		$this->public = $public;

		return $this;
	}

	/**
	 * Get public
	 *
	 * @return boolean
	 */
	public function getPublic()
	{
		return $this->public;
	}

	/**
	 * Set author
	 *
	 * @param \Rudak\UserBundle\Entity\User $author
	 * @return Page
	 */
	public function setAuthor(\Rudak\UserBundle\Entity\User $author = null)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get author
	 *
	 * @return \Rudak\UserBundle\Entity\User
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * @return int
	 */
	public function getHit()
	{
		return $this->hit;
	}

	/**
	 * @param int $hit
	 */
	public function setHit($hit)
	{
		$this->hit = $hit;
	}


}
