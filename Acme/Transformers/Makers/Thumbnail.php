<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class Thumbnail extends Transformer
{
	public function transform($image)
    {
        return [
            'type' => 'image',
            'thumbnail' => [
                'name' => $image->name,
                'extension' => $image->extension,
            ],
        ]; 
	}
}