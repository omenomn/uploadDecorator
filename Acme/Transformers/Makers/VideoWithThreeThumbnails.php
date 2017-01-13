<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class VideoWithThreeThumbnails extends Transformer
{
	public function transform($video)
    {
        return [
            'id' => $video->id,
            'type' => 'video',
            'video' => [
                'name' => $video->name,
                'extension' => $video->extension,
            ],
            'thumbnails' => $video->thumbnails,
        ]; 
	}
}