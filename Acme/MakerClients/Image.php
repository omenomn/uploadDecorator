<?php

namespace Acme\MakerClients;

use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\Images\ImageSessionPuter;
use Acme\Transformers\Makers\Image as ImageTransformer;

class Image extends ClientMakerAbstract
{
    public function __construct()
    {
      $this->maker = new Puter(new ImageSessionPuter(new Returner));
      $this->transformer = new ImageTransformer;
      $this->disk = 'tempImages';
    }
}