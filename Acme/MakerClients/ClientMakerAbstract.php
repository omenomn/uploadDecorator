<?php

namespace Acme\MakerClients;

abstract class ClientMakerAbstract
{
  protected $maker;
  protected $disk;
  protected $transformer;

  public function make($file)
  {       		  
    return $this
      ->transformer
      ->transform($this->maker->make($this->getObject($file)));
  }

  protected function getObject($file)
  {
    $object = new \stdClass;

    $object->name = $file->getClientOriginalName();
    $object->extension = $file->getClientOriginalExtension();
    $object->content = $this->getContent($file->getRealPath());
    $object->path = $file->getRealPath();  
    $object->disk = $this->disk;  

    return $object;
  }

  public function setDisk($disk)
  {
    $this->disk = $disk;
  }

  protected function getContent($path)
  {
    return \File::get($path);
  }
}