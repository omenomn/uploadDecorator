<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use Storage;

class Puter extends MakerAbstract
{

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }
    
    public function make($object)
    {      
    	$disk = Storage::disk($object->disk);         
        $name = $object->name;

        if ($disk->exists($name)) 
            $disk->delete($name);

        $disk->put($name, $object->content);

        return $this->maker->make($object);
    }
}