<?php

namespace Model;

/**
 * Class NewsPost
 *
 * Class for render NewsPost
 */

class NewsPost extends AbstractPost
{
    public function render()
    {
        /**
         * render NewsPost to array
         */
        $name = explode ('\\', __CLASS__);
        echo $name[count($name)-1]. '<br>';

        foreach ($this->data as $tag => $value){
            echo $tag. '=>'. $value. '<br>';
        }
    }
}
