<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class ImageWithThumbnailResource extends Transformer
{
	public function transform($image)
    {
        return [
            'id' => $image->id,
            'type' => 'image',
            'name' => $image->name,
            'realImage' => route('temp-real-image.file', [$image->name]),
            'thumbImage' => route('temp-thumbnail.file', [$image->thumbnail->name]),
        ]; 
	}
}