<?php

namespace Exceptions;

/**
 * Class InvalidPostKeyException
 * @package Exceptions
 */
class InvalidPostKeyException extends \Exception
{

    /**
     * Returns an error message when invalid post key is used
     */
    public function __construct()
    {
        return "The type of a post is invalid!";
    }

}