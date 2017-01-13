<?php

namespace Acme\MakerClients;

use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\Images\ContentToImageChanger;
use Acme\Makers\Files\Images\ThumbnailFromImageCuter;
use Acme\Makers\Files\Images\ImageSessionPuter;
use Acme\Transformers\Makers\ImageWithThumbnailResource as ImageWithThumbnailResourceTransformer;

class ImageWithThumbnail extends ClientMakerAbstract
{
    public function __construct()
    {
      $this->maker = 
        new ContentToImageChanger(
          new ThumbnailFromImageCuter(
            new ImageSessionPuter(
              new Puter(
                new Returner))));

      $this->transformer = new ImageWithThumbnailResourceTransformer;
      $this->maker->disk = 'tempImages';
    }
}