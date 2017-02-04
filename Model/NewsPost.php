<?php

namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost implements Renderable
{

    /**
     * @var string $title post title
     * @var string $content post content
     */
    public $title;
    public $content;

    /**
     * Shows post contents
     */
    public function render()
    {
        echo '<b>' . $this->title . '</b><br>';
        echo $this->content . '<br>';
    }

}