<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class VideoWithThumbnail extends Transformer
{
	public function transform($video)
    {
        return [
            'type' => 'video',
            'video' => [
                'name' => $video->name,
                'extension' => $video->extension,
            ],
            'thumbnail' => $video->thumbnail,
        ]; 
	}
}