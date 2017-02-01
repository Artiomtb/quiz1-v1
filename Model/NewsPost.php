<?php

/**
 * Class NewsPost
 *
 */

namespace Model;

class NewsPost extends AbstractPost
{
	/**
	 * @return string
	 */
	function render(): string
	{
		$title		= '<h1>'.$this->options['title'].'</h1>';
		$content	= '<div>'.$this->options['content'].'</div>';

		return $title.$content;
	}
}