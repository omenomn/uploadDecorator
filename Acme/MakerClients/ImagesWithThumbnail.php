<?php

namespace Acme\MakerClients;

use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\Images\ContentToImageChanger;
use Acme\Makers\Files\Images\ThumbnailFromImageCuter;
use Acme\Makers\Files\Images\ImageSessionPuter;
use Acme\Transformers\Makers\ImageWithThumbnailResourceWithoutIdAndType as ImageWithThumbnailResourceWithoutIdAndTypeTransformer;

class ImagesWithThumbnail extends ClientMakerAbstract
{
    public function __construct()
    {
      $this->maker =     
        new ContentToImageChanger(
          new ThumbnailFromImageCuter(
            new ImageSessionPuter(
              new Puter(
                new Returner))));

      $this->maker->disk = 'tempImages';
      $this->transformer = new ImageWithThumbnailResourceWithoutIdAndTypeTransformer;
    }

    public function make($files)
    {      
      $makers = [];

      foreach ($files as $file) {        
        $makers[] = $this
          ->transformer
          ->transform($this->maker->make($this->getObject($file)));
      }

      return $makers;
    }
}