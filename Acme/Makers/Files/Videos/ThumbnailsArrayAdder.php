<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;

class ThumbnailsArrayAdder extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($object)
    {           
        if (!is_null($object->thumbnail))

            if (!isset($object->thumbnails) ||
                is_null($object->thumbnails) ||
                !is_array($object->thumbnails))
                        $object->thumbnails = [];  

        $thumbnails = $object
            ->thumbnails;
            
        $thumbnails[] = $object
            ->thumbnail;

        unset($object->thumbnail);

        $object
            ->thumbnails = $thumbnails;
            
    	return $this->maker->make($object);
    }
}