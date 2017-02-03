<?php

namespace Model;
/**
 * Class BlogPost
 * override method
 */
class BlogPost extends Post
{

    function render():string
    {
        $title = '<h3>'.$this->options['title'].'</h3>';
        $content = '<div>'.$this->options['content'].'</div>';
        $author = '<i>'.$this->options['author'].'</i>';
        return $title.$content.$author;
    }
}