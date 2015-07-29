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
class Category {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\WE\Classwork\Domain\Model\Post> $posts
	 * @ORM\ManyToMany(mappedBy="categories")
	 */
	protected $posts;


	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * @return string
	 */
	public function getIdentity() {
		return $this->persistenceManager->getIdentifierByObject($this);
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

}