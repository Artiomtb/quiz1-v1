<?php

require_once 'Autoloader.php';

use Exceptions\InvalidPostKeyException;
use Exceptions\ClassNotFoundException;

/**
 * Class PostCreator
 */
class PostCreator
{
    private static $instance = null;
    /**
     * @post_name array|mixed Classes imported from config.php
     */
    private $post_name = [];


    /**
     * PostCreator constructor.
     */
    private function __construct()
    {
        $this->post_name = require 'config.php';
    }

    /**
     * @return null|PostCreator
     */
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
        //Leave empty
    }

    /**
     * @param $post
     * @param $body
     * @return mixed
     * @throws \Exceptions\ClassNotFoundException
     * @throws \Exceptions\InvalidPostKeyException
     */
    public function make($post, $body)
    {
        if (array_key_exists($post,$this->post_name)){
            if (class_exists($this->post_name[$post]))
                return new $this->post_name[$post]($body);
            else{
                throw new ClassNotFoundException();
            }
        }
        else{
            throw new InvalidPostKeyException();
        }
    }

}