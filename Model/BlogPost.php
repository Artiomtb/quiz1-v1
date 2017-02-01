<?php

/**
 * Class BlogPost
 * @property array $options
 *
 */
namespace Model;

class BlogPost extends AbstractPost
{
	/**
	 * @return string
	 */
	function render(): string
	{
		$title = '<h1>' . $this->options['title'] . '</h1>';
		$content = '<div>' . $this->options['content'] . '</div>';
		$author = '<i>' . $this->options['author'] . '</i>';

		return $title . $content . $author;
	}
}