<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class ImageWithThumbnail extends Transformer
{
	public function transform($image)
    {
        return [
            'type' => 'image',
            'image' => [
                'name' => $image->name,
                'extension' => $image->extension,
            ],            
            'thumbnail' => [
                'name' => $image->thumbnail->name,
                'extension' => $image->thumbnail->extension,
            ],
        ]; 
	}
}