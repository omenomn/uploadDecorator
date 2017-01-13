<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\VideoWithThreeThumbnails;

class ImagesWithThumbnailSessionPuter extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;

    }

    public function make($properties)
    {         
      $properties->id = str_random(40);

      if (!session()->has('images')) {
        session(['images' => []]);
      }

      $images = session('images');
      $images[] = $properties->name;

      session()->put('images',  $images);

    	return $this->maker->make($properties);
    }
}