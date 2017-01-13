<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\VideoWithThreeThumbnails;

class ImageSessionPuter extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;

    }

    public function make($object)
    {         
      $object->id = str_random(40);

      session()->put($object->id , [
        'name' => $object->name,
        'type' => 'image',
      ]);

    	return $this->maker->make($object);
    }
}