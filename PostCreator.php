<?php

use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;
use Model\AbstractPost;

/**
 * Class PostCreator
 *
 * Factory for Posts
 */

class PostCreator
{

    private static $instance = null;

    /**
     * @var array $map config file for factory
     */
    private $map = array();

    /**
     * @param string $type name of Post
     * @param array $array data for Post
     * @return AbstractPost
     * @throws ClassNotFoundException
     * @throws InvalidPostKeyException
     */

    public function make(string $type, array $array):AbstractPost
    {
        $result = NULL;
        if($this->map[$type]) {
           if (class_exists($this->map[$type])) {
               $result = new $this->map[$type]($array);
               return $result;
            }else {
                throw new ClassNotFoundException("Class $this->map[$type] not found");
            }
        }else {
            throw new InvalidPostKeyException("Key $type not found");
        }
    }

    private function __construct()
    {
        $this->map = include("config.php");
    }

    public static function getInstance():self
    {
        if (self::$instance == null) {
             self::$instance = new self();
        }

        return self::$instance;
    }


    private function __clone()
    {
    }
    private function __wakeup()
    {
    }


}