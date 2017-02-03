<?php
namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost extends Post implements Renderable, Exposable
{
    /**
     * NewsPost constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        $title = $params['title'];
        $content = $params['content'];

        parent::__construct($title, $content);
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

        $spacer = "<hr>";

        return $title . $content . $spacer;
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