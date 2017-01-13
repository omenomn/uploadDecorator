<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Image as GrImage;

class ContentToImageChanger extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($object)
    {   
        $object->content = GrImage::make($object->content);
        $object->content->encode($object->extension);

    	return $this->maker->make($object);
    }
}