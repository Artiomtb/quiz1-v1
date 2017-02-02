<?php

namespace Model;

/**
 * Interfaces Renderable
 */
interface Renderable
{
    /**
     * Returns string to render
     *
     * @return string
     */
    function render():string;
}