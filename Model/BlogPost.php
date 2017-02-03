<?php

namespace Model;

/**
 * Class BlogPost
 *
 * Class for render BlogPost
 */

class BlogPost extends AbstractPost
{
    /**
     * render BlogPost to string
     */
    public function render()
    {
        $name = explode ('\\', __CLASS__);
        echo $name[count($name)-1]. '<br>';

        $string = null;
        foreach ($this->data as $tag => $value){
            $string .= $tag. '='. $value;
        }
        echo $string;
    }
}