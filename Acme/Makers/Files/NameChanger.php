<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use Storage;

class NameChanger extends MakerAbstract
{

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }
    
    public function make($properties)
    {      
    	$properties->name = (isset($this->properties['name'])) ? 
    		$this->properties['name'] : 
    		null;

        return $this->maker->make($properties);
    }
}