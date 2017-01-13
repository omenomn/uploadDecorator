<?php

namespace Acme\Makers\Files\Images;

use Acme\Makers\Files\MakerAbstract;

use Illuminate\Http\Request;

class ThumbnailResizer extends MakerAbstract
{
    public function __construct(MakerAbstract $maker)
    {
        $this->maker = $maker;
    }

    public function make($propeties)
    {       	
	    $maxHeight = 150;

	    if ($propeties->content->height() >= $maxHeight)
	      $propeties->content->resize(null, $maxHeight, function ($constraint) {
	          $constraint->aspectRatio();
	      });
	  
    	return $this->maker->make($propeties);
    }
}