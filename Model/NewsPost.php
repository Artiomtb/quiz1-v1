<?php
namespace Model;
class NewPost extends Post
{

    function render():string
    {
        $title = '<p>'.$this->options['title'].'</p>';
        $content = '<div>'.$this->options['content'].'</div>';

        return $title.$content;
    }
}