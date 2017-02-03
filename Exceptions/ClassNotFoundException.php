<?php
namespace Exceptions;
use Exception;

/**
 * Created by PhpStorm.
 * User: shtoorman
 * Date: 01.02.17
 * Time: 20:47
 */
class ClassNotFoundException extends Exception
{
    /**
     *
     */
    public function getMessage(){
        echo 'No this class';
    }
}