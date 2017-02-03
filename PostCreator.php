<?php

require_once 'Autoloader.php';

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
        $this->post_name = require_once 'config.php';
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
     * @throws \Exceptions\InvalidPostKeyException
     */
    public function make($post, $body)
    {
        if ($post != '')  {
            return new $this->post_name[$post]($body);
        }
        else{
            throw new Exceptions\InvalidPostKeyException();
        }
    }

}