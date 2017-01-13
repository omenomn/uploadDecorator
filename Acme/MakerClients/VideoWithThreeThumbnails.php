<?php

namespace Acme\MakerClients;

use Illuminate\Http\Request;
use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\ThreeThumbnailsFromVideoCuter;
use Acme\Makers\Files\VideoWithThreeThumbnailsSessionPuter;
use Acme\Transformers\Makers\VideoWithThreeThumbnailsResource as VideoWithThreeThumbnailsResourceTransformer;

class VideoWithThreeThumbnails extends ClientMakerAbstract
{
    public function __construct()
    {   
      $this->maker = 
            new ThreeThumbnailsFromVideoCuter(
              new VideoWithThreeThumbnailsSessionPuter(
                  new Puter(
                    new Returner)));

      $this->disk = 'tempVideos';
      $this->transformer = new VideoWithThreeThumbnailsResourceTransformer;
    }
}