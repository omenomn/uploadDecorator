<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use Storage;

class Remover extends MakerAbstract
{    
    public function make($properties)
    {        
        $disk = Storage::disk($properties->disk);     

    	if ($disk->exists($properties->name)) 
        	$disk->delete($properties->name);  

        return true;
    }
}