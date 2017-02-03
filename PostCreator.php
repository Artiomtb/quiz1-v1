<?php
use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;
use Model\Post;

/**
 * Created by PhpStorm.
 * User: shtoorman
 * Date: 01.02.17
 * Time: 19:56
 */
class PostCreator
{
    private static $instance = null;

    /**
     * PostCreator constructor.
     */

    private function __construct()
    {
    }

    public static function getInstance()
    {
        //check if initialized
        if (self::$instance == null) {
            //init
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function make(string $string, array $arr ){
            $arrayConfig = include 'config.php';
            if (array_key_exists($string, $arrayConfig)) {
                if (class_exists($arrayConfig[$string])) {
                    return new $arrayConfig[$string]($arr);
                } else {
                    throw new ClassNotFoundException();
                }
            } else {
                throw new InvalidPostKeyException();
            }
        }

    private function __clone()
    {
    }
}