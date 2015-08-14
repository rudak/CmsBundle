<?php

namespace Rudak\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="rudak_cms_category")
 * @ORM\Entity(repositoryClass="Rudak\CmsBundle\Entity\CategoryRepository")
 */
class Category
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
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\OneToMany(targetEntity="Rudak\CmsBundle\Entity\Page",
	 * mappedBy="Category",
	 * cascade={"remove"}
	 * )
	 */
	private $pages;

	public function __construct()
	{

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
	 * @return Category
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
	 * Add pages
	 *
	 * @param \Rudak\CmsBundle\Entity\Page $pages
	 * @return Category
	 */
	public function addPage(\Rudak\CmsBundle\Entity\Page $pages)
	{
		$this->pages[] = $pages;

		return $this;
	}

	/**
	 * Remove pages
	 *
	 * @param \Rudak\CmsBundle\Entity\Page $pages
	 */
	public function removePage(\Rudak\CmsBundle\Entity\Page $pages)
	{
		$this->pages->removeElement($pages);
	}

	/**
	 * Get pages
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getPages()
	{
		return $this->pages;
	}
}
