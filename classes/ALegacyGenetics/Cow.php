<?php

namespace ALegacyGenetics;

class Cow {
	
	const COW_TYPE_WHITE_ANGUS = 'alg_white_angus_bull';
	const COW_TYPE_GYRLONDO = 'alg_gyrolondo_bull';
	
	private $id;
	private $cow_type;
	private $title;
	private $content;
	private $image;
	private $url;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return Cow
	 */
	public function setId( $id )
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCowType()
	{
		return $this->cow_type;
	}

	/**
	 * @param mixed $cow_type
	 *
	 * @return Cow
	 */
	public function setCowType( $cow_type )
	{
		$this->cow_type = $cow_type;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return ( $this->title === NULL ) ? '' : $this->title;
	}

	/**
	 * @param mixed $title
	 *
	 * @return Cow
	 */
	public function setTitle( $title )
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return ( $this->content === NULL ) ? '' : $this->content;
	}

	/**
	 * @param mixed $content
	 *
	 * @return Cow
	 */
	public function setContent( $content )
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImage()
	{
		return ( $this->image === NULL ) ? '' : $this->image;
	}

	/**
	 * @param mixed $image
	 *
	 * @return Cow
	 */
	public function setImage( $image )
	{
		$this->image = $image;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 *
	 * @return Cow
	 */
	public function setUrl( $url )
	{
		$this->url = $url;

		return $this;
	}
}