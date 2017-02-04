<?php

namespace Model;

/**
 * Class BlogPost
 * @package Model
 */
class BlogPost implements Renderable
{

    /**
     * @var string $title post title
     * @var string $content post content
     * @var string $author post author
     */
    public $title;
    public $content;
    public $author;

    /**
     * Shows post contents
     */
    public function render()
    {
        echo '<b>' . $this->title . '</b><br>';
        echo $this->content . '<br>';
        echo '<i>' . $this->author . '</i><br>';
    }
}
