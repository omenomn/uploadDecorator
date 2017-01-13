<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use Acme\Transformers\Makers\ImageWithThumbnailResource;

class ImageWithThumbnailResourceTransformer extends MakerAbstract
{
	protected $transformer;

    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
        $this->transformer = new ImageWithThumbnailResource;

    }

    public function make($properties)
    {   
    	return $this
    		->transformer
    		->transform($this->maker->make($properties));
    }
}