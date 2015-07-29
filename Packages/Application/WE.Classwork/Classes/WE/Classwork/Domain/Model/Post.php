<?php
namespace WE\Classwork\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WE.Classwork".          *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Post {
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\WE\Classwork\Domain\Model\Category> $categories
	 * @ORM\ManyToMany(inversedBy="posts")
	 */
	protected $categories;

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $categories
	 */
	public function setCategories($categories)
	{
		$this->categories = $categories;
	}


}