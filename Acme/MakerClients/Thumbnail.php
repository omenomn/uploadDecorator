<?php

namespace Acme\MakerClients;

use Acme\Makers\Files\Encoder;
use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\Images\ContentToImageChanger;
use Acme\Makers\Files\Images\ThumbnailResizer;
use Acme\Transformers\Makers\Thumbnail as ThumbnailTransformer;

class Thumbnail extends ClientMakerAbstract
{
    public function __construct()
    {
      $this->maker = new ContentToImageChanger( 
        new ThumbnailResizer(
          new Puter(
            new Returner)));

      $this->transformer = new ThumbnailTransformer;
      $this->disk = 'tempThumbs';
    }
}