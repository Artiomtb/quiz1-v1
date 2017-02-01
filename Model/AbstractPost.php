<?php

namespace Model;

abstract class AbstractPost implements Renderable
{
	protected $options;


	/**
	 * Post constructor.
	 * @param array $options
	 */
	function __construct(array $options)
	{
		$this->options = $options;
	}
}