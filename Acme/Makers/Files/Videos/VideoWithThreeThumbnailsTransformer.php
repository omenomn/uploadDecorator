<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\VideoWithThreeThumbnails;

class VideoWithThreeThumbnailsTransformer extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
        $this->transformer = new VideoWithThreeThumbnails;

    }

    public function make($properties)
    {   
    	return $this
    		->transformer
    		->transform($this->maker->make($properties));
    }
}