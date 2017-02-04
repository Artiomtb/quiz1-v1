<?php
namespace Model;

/**
 * Class BlogPost
 * @package Model
 */
class BlogPost extends Post implements Renderable, Exposable
{
    /**
     * Author of post
     *
     * @var string
     */
    private $author;

    /**
     * BlogPost constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        $title = $params['title'];
        $content = $params['content'];
        $author = $params['author'];

        parent::__construct($title, $content);
        $this->author = $author;
    }

    /**
     * Returns author of post
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Sets author of post
     *
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**
     * Returns all class fields with html to view
     *
     * @return string
     */
    public function render(): string
    {
        $title = "<h1>{$this->getTitle()}</h1>";
        $content = "<div>{$this->getContent()}</div>";
        $author = "<div>{$this->getAuthor()}</div>";

        $spacer = "<hr>";

        return $title . $content . $author . $spacer;
    }

    /**
     * Returns array of field of class
     *
     * @return array
     */
    public static function expose(): array
    {
        return
            array_merge(
                parent::expose(),
                get_class_vars(__CLASS__)
            );
    }
}