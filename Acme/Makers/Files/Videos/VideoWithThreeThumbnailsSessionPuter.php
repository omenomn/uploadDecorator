<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\VideoWithThreeThumbnails;

class VideoWithThreeThumbnailsSessionPuter extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;

    }

    public function make($properties)
    {         
      $thumbsSession = [];

      foreach ($properties->thumbnails as $key => $name) {

        $i = $key + 1;
        $thumbsSession[$i] = $name;        
      }

      $properties->id = str_random(40);

      session()->put($properties->id , [
        'name' => $properties->name,
        'type' => 'video',
        'thumbs' => $thumbsSession,
      ]);

    	return $this->maker->make($properties);
    }
}