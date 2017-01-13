<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class Image extends Transformer
{
	public function transform($image)
    {
        return [
            'type' => 'image',
            'image' => [
                'name' => $image->name,
                'extension' => $image->extension,
            ],
        ]; 
	}
}