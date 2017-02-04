<?php
namespace Model;

/**
 * Interface Renderable
 * @package Model
 */
interface Renderable
{
    /**
     * Returns all class fields with html to view
     *
     * @return string
     */
    public function render();
}