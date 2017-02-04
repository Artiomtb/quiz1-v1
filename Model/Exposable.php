<?php
namespace Model;


/**
 * Interface Exposable
 * @package Model
 */
interface Exposable
{
    /**
     * Returns array of field of class
     *
     * @return array
     */
    public static function expose();
}