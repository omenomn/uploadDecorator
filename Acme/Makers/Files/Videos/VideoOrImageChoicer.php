<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;

class VideoOrImageChoicer extends MakerAbstract
{
    protected $video;
    protected $image;

    public function __construct(MakerAbstract $video, MakerAbstract $image)
    {
        $this->video = $video;
        $this->image = $image;
    }

    public function make($properties)
    {   
        $maker = null;

        if ($properties->extension == 'mp4') {
            $maker = $this->video;
            $properties->disk = 'tempVideos';
        } else {
            $maker = $this->image;
            $properties->disk = 'tempImages';
        }

    	return $maker->make($properties);
    }
}