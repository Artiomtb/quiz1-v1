<?php
namespace Model;

/**
 * Class Post
 * @package Model
 */
abstract class Post implements Exposable
{
    /**
     * Title of post
     *
     * @var string
     */
    private $title;

    /**
     * Content of post
     *
     * @var string
     */
    private $content;

    /**
     * Post constructor.
     *
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Gets title of post
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * Sets title of post
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Gets content of post
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Sets content of post
     *
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Returns array of field of class
     *
     * @return array
     */
    public static function expose(): array
    {
        return get_class_vars(__CLASS__);
    }

}