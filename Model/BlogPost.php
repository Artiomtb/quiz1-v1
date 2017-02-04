<?php

namespace Model;

/**
 * Class BlogPost
 * @package Model
 */
class BlogPost extends Post
{

    /**
     * @var string $author post author
     */
    protected $author;

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
