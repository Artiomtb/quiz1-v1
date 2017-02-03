<?php

namespace Exceptions;

/**
 * Class ClassNotFoundException
 * @package Exceptions
 */
class ClassNotFoundException extends \Exception
{

    /**
     * Returns an error message when unable to locate a class
     */
    public function __construct()
    {
        return "Unable to locate a specified class!";
    }

}