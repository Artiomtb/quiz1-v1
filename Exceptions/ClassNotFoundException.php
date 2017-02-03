<?php

namespace Exceptions;

/**
 * Class ClassNotFoundException
 * @package Exceptions
 */
class ClassNotFoundException
{

    /**
     * Sends an error message when unable to locate a class
     */
    public function getMessage()
    {
        echo "Unable to locate a specified class!";
    }
    
}