<?php
use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;
use Model\Post;

/**
 * Factory of posts
 *
 * Class PostCreator
 */
class PostCreator
{

    private static $instance = null;
    private $config = [];

    /**
     * PostCreator constructor.
     */
    private function __construct()
    {
        $this->config = require "config.php";
    }

    /**
     * Returns singleton of PostCreator factory
     *
     * @return PostCreator
     */
    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __clone()
    {
        //leave
    }

    public function __wakeup()
    {
        //leave
    }

    /**
     * Returns post by key and data
     *
     * @param string $postKey
     * @param array $postData
     * @return Post
     * @throws ClassNotFoundException
     * @throws InvalidPostKeyException
     */
    public function make(string $postKey, array $postData): Post
    {
        if (array_key_exists($postKey, $this->config)) {
            $className = $this->config[$postKey];
            if (class_exists($className)) {
                return new $className($postData);
            } else {
                throw new ClassNotFoundException("Class $className not found!");
            }
        } else {
            throw new InvalidPostKeyException("Key $postKey not found in config!");
        }

    }
}