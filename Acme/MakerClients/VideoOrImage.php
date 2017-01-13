<?php

namespace Acme\MakerClients;

use Illuminate\Http\Request;
use Acme\Makers\Files\VideoOrImageChoicer;
use Acme\Makers\Files\ContentToImageChanger;
use Acme\Makers\Files\Puter;
use Acme\Makers\Files\Returner;
use Acme\Makers\Files\ThumbnailFromImageCuter;
use Acme\Makers\Files\RandomNamer;
use Acme\Makers\Files\ImageSessionPuter;
use Acme\Makers\Files\ThreeThumbnailsFromVideoCuter;
use Acme\Makers\Files\VideoWithThreeThumbnailsSessionPuter;
use Acme\Makers\Files\VideoWithThreeThumbnailsResourceTransformer;
use Acme\Makers\Files\ImageWithThumbnailResourceTransformer;

class VideoOrImage extends ClientMakerAbstract
{
    public function __construct()
    {
        $image =  
          new ImageWithThumbnailResourceTransformer(
            new ContentToImageChanger(
              new ThumbnailFromImageCuter(
                new ImageSessionPuter(
                  new Puter(
                    new Returner)))));

        $video = 
          new VideoWithThreeThumbnailsResourceTransformer(
            new ThreeThumbnailsFromVideoCuter(
              new VideoWithThreeThumbnailsSessionPuter(
                  new Puter(
                    new Returner))));

        $this->maker = 
            new VideoOrImageChoicer($video, $image);
    }

    public function make($file)
    {    
    	return $this->maker->make($this->getObject($file));
    }
}