<?php

namespace Acme\MakerClients;

use Illuminate\Http\Request;
use Acme\Makers\Files\MakerAbstract;
use Acme\Makers\Files\UploadPropertyGeter;
use Acme\Makers\Files\ContentGeter;
use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\ThumbnailFromVideoCuter;
use Acme\Transformers\Makers\VideoWithThumbnail as VideoWithThumbnailTransformer;

class VideoWithThumbnail extends ClientMakerAbstract
{
    public function __construct()
    {
      $this->maker = new ThumbnailFromVideoCuter(
          new Puter(
            new Returner));

      $this->maker->disk = storage_path('temp/images/thumbs/');

      $this->transformer = new VideoWithThumbnailTransformer;
      
      $this->disk = 'tempVideos';
    }
}