<?php

namespace Patroklo\Tags\Traits;


use Conner\Tagging\Taggable;

trait TaggableTrait
{
    use Taggable;


    
    function __construct()
    {
        echo '<pre>';
            var_dump('sflkjdsfdljsaflñfñklj');
        echo '</pre>';
        die();
    }

    /**
     * @inheritdoc
     */
    function bootIfNotBooted()
    {
       echo '<pre>';
           var_dump('dsflkjdasfkljdasfjdsfsklf');
       echo '</pre>';
       die();
        parent::bootIfNotBooted();
    }

}