<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;

class ThreeThumbnailsFromVideoCuter extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {          
        $disk = storage_path('temp/images/thumbs/');  

        $maker = new ThumbnailFromVideoCuter(new ThumbnailsArrayAdder($maker));    
        $maker->disk = $disk;
        for ($x = 0; $x <= 1; $x++) {
            $maker = new ThumbnailFromVideoCuter(new ThumbnailsArrayAdder($maker));    
            $maker->disk = $disk;
        } 

        $this->maker = $maker;
    }

    public function make($object)
    {       	       
        return $this->maker->make($object);
    }
}