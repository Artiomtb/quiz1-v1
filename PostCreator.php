<?php

/**
 * Class PostCreator
 * Creates posts of different types. Implements Singleton and Factory patterns
 */
class PostCreator
{

    /**
     * @var object $instance instance of PostCreator
     */
    protected static $instance;

    /**
     * PostCreator constructor
     */
    private function __construct()
    {
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
     * @return object $post specified post
     * @throws ClassNotFoundException the proper post type class does not exist
     * @throws InvalidPostKeyException post type was not correctly specified
     */
    static function make(string $post_type, array $content)
    {
        /**
         * @var array $nspath paths of different post type classes
         */
        $nspath = include 'config.php';
        if (array_key_exists($post_type, $nspath)) {
            if (class_exists($nspath[$post_type])) {
                $post = new $nspath[$post_type]();

                foreach ($content as $key => $value) {
                    $post->{$key} = $value;
                }

                return $post;
            } else {
                throw new ClassNotFoundException();
            }
        } else {
            throw new InvalidPostKeyException();
        }
    }

}