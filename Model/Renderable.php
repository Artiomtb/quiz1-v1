<?php

namespace Model;

/**
 * Interface Renderable
 * @package Model
 */
interface Renderable
{
    /**
     * @return string
     */
    function render(): string;
}