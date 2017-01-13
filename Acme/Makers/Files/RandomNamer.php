<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;

class RandomNamer extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($properties)
    {   
        $properties->name = str_random(20) . '.' . $properties->extension;
	  
    	return $this->maker->make($properties);
    }
}