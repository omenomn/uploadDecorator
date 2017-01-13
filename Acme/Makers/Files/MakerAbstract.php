<?php

namespace Acme\Makers\Files;

use Illuminate\Http\Request;
use SplObserver;
use SplSubject;

abstract class MakerAbstract
{
	protected $maker;
	protected $subjectObserve = null;
	protected $properties = [];

	public abstract function make($file);

	public function __get($property)
	{
		return (isset($this->properties[$property]) ? $this->properties[$property] : null);
	}

	public function __set($property, $value)
	{
		$this->properties[$property] = $value;
	}
}