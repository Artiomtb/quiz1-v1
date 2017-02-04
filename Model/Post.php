<?php

namespace Model;

/**
 * Class Post
 * Universal post class
 * @package Model
 */
abstract class Post implements Renderable
{

    /**
     * @var string $title post title
     * @var string $content post content
     */
    protected $title;
    protected $content;

    /**
     * Post constructor. Sets the protected variables
     * @param array $content post content
     */
    public function __construct(array $content)
    {
        foreach ($content as $key => $value) {
            $this->{$key} = $value;
        }
    }

}