<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\VideoWithThreeThumbnailsResource;

class VideoWithThreeThumbnailsResourceTransformer extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
        $this->transformer = new VideoWithThreeThumbnailsResource;

    }

    public function make($properties)
    {   
    	return $this
    		->transformer
    		->transform($this->maker->make($properties));
    }
}