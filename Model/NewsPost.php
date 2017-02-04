<?php

namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost extends Post
{

    /**
     * Shows post contents
     */
    public function render()
    {
        echo '<b>' . $this->title . '</b><br>';
        echo $this->content . '<br>';
    }

}