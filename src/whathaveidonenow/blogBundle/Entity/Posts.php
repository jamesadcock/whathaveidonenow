<?php

namespace whathaveidonenow\blogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */


class Posts
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;


	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $path;

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
	 * Set path
	 *
	 * @param string $path
	 * @return Posts
	 */
	public function setPath($path)
	{
		$this->path = $path;

		return $this;
	}

	/**
	 * Get path
	 *
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}
}