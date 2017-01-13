<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use Storage;

class DiskChanger extends MakerAbstract
{

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }
    
    public function make($object)
    {      
    	$object->disk = (isset($this->properties['disk'])) ? 
    		$this->properties['disk'] : 
    		null;

        return $this->maker->make($object);
    }
}