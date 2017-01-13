<?php

namespace Acme\Transformers;

abstract class Transformer 
{
	public function transformCollection($items)
    {
    	$self = $this; 

        return $items->map(function ($item, $key) use ($self) {
            return $self->transform($item);
        });
    }

    public abstract function transform($item);
}