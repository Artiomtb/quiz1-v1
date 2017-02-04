<?php

/**
 * Class PostCreator
 * Creates posts of different types. Implements Singleton and Factory patterns
 */
class PostCreator
{

    /**
     * @var object $instance instance of PostCreator
     * @var array $nspath paths of different post type classes
     */
    protected static $instance;
    protected static $nspath;

    /**
     * PostCreator constructor
     */
    private function __construct()
    {
        self::$nspath = include 'config.php';
    }

    /**
     * PostCreator clone method
     */
    private function __clone()
    {
    }

    /**
     * Returns an existing or new instance of PostCreator
     * @return object $instance PostCreator
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Creates a post with specified parameters
     * @param string $post_type type of a post
     * @param array $content post content
     * @return object specified post
     * @throws ClassNotFoundException the proper post type class does not exist
     * @throws InvalidPostKeyException post type was not correctly specified
     */
    public static function make(string $post_type, array $content): \Model\Post
    {
        if (array_key_exists($post_type, self::$nspath)) {
            if (class_exists(self::$nspath[$post_type])) {
                return new self::$nspath[$post_type]($content);
            } else {
                throw new ClassNotFoundException();
            }
        } else {
            throw new InvalidPostKeyException();
        }
    }

}