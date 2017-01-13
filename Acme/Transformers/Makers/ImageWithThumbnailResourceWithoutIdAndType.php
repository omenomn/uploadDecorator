<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class ImageWithThumbnailResourceWithoutIdAndType extends Transformer
{
	public function transform($image)
    {
        return [
            'name' => $image->name,
            'realImage' => route('temp-real-image.file', [$image->name]),
            'thumbnail' => route('temp-thumbnail.file', [$image->thumbnail->name]),
        ]; 
	}
}