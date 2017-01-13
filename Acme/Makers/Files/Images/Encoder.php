<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Image as GrImage;

class Encoder extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($propeties)
    {   
    	$propeties->content->encode($propeties->extension);
    	
    	return $this->maker->make($propeties);
    }
}