<?php

namespace Acme\Transformers\Makers;

use Acme\Transformers\Transformer;

class VideoWithThreeThumbnailsResource extends Transformer
{
	public function transform($video)
    {
        $thumbs = [];

        foreach ($video->thumbnails as $key => $name) {
            $thumbs[] = [
                'url' => route('temp-thumbnail.file', [$name]),
                'value' => $key + 1,
            ];
        }

        return [
            'id' => $video->id,
            'type' => 'video',
            'url' => route('temp-video.file', [$video->name]),
            'thumbs' => $thumbs,
            'thumbSelected' => null,
        ]; 
	}
}