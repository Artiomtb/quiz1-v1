<?php

namespace Model;
/**
 * Created by PhpStorm.
 * User: shtoorman
 * Date: 03.02.17
 * Time: 20:26
 */
abstract class Post
{
    private $title;
    private $content;
    private $author;


    /**
     * Post constructor.
     * @param string $title
     * @param string $content
     * @param string $author
     */
    private function __construct(string $title, string $content, string $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    private function getTile(){
        return $this->title;
    }

    private function getContent(){
        return $this->title;
    }

    private function getAutor(){
        return $this->title;
    }

    function __toString()
    {
        echo 'title'.$this->getTile();
        echo 'content'.$this->getContent();
        echo 'autor'.$this->getAutor();
    }
}