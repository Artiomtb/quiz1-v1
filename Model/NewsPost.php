<?php


namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost extends Post
{
    /**
     * @inheritdoc
     */
    public function render(): string
    {
        return "<b>NEWS:</b><br>" . parent::render();
    }
}