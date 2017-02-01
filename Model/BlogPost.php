<?php

/**
 * Class BlogPost
 */
class BlogPost extends Post
{
    /**
     * @var string
     */
    private $author;

    /**
     * BlogPost constructor.
     * @param string $title
     * @param string $content
     * @param string $author
     */
    public function __construct(string $title, string $content, string $author)
    {
        parent::__construct($title, $content);
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

}