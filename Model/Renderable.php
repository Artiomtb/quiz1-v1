<?php


namespace Model;

/**
 * Impementents render
 *
 * Interface Renderable
 * @package Model
 */
interface Renderable
{
    /**
     * Returns object in string type
     *
     * @return string
     */
    public function render(): string;
}