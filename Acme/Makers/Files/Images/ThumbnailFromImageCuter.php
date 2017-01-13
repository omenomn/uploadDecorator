<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;

class ThumbnailFromImageCuter extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
      $this->maker = $maker;
    }

    public function make($object)
    {       		
      $diskChanger = 
            new DiskChanger(
              $this->maker);
      $diskChanger->disk = (isset($this->properties['disk'])) ? 
        $this->properties['disk'] :'tempThumbs';

      $thumbnail = 
          new ThumbnailResizer($diskChanger);

      $object->thumbnail = $thumbnail->make($object);

      return $this->maker->make($object);
    }
}