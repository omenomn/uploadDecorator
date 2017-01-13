<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use Storage;

class Returner extends MakerAbstract
{
    public function make($object)
    {      
        return $object;
    }
}