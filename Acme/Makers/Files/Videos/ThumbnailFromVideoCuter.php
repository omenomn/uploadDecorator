<?php

namespace Acme\Makers\Files\Videos;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;
use FFMpeg\FFMpeg;

class ThumbnailFromVideoCuter extends MakerAbstract 
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($object)
    {   
    	$disk = $this->properties['disk'];
      $path = $object->path;

      $ffmpeg = FFMpeg::create([
        'ffmpeg.binaries'  => config('ffmpeg.ffmpeg'),
        'ffprobe.binaries' => config('ffmpeg.ffprobe'),
        'timeout'          => 3600, // The timeout for the underlying process
        'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
      ]);
      
      $video = $ffmpeg->open($path);

      $ffprobe = \FFMpeg\FFProbe::create([
        'ffmpeg.binaries'  => config('ffmpeg.ffmpeg'),
        'ffprobe.binaries' => config('ffmpeg.ffprobe'),
        'timeout'          => 3600, // The timeout for the underlying process
        'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
      ]);
      
      $duration = $ffprobe
          ->format($path) // extracts file informations
          ->get('duration'); 

      $diffDuration = $duration / 5;
      $thumbExt = '.jpg';
      $thumbsResource = [];
      $thumbsSession = [];

      $name = str_random(40) . $thumbExt;

      $frame = $video
      ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($diffDuration * 2));
      $frame
      ->save($disk . $name);

      $object->thumbnail = $name;
    	
      return $this->maker->make($object);
    }
}