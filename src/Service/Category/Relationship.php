<?php

namespace App\Service\Model\Category;

trait Relationship {

	private function Sub ($model, $key)
	{
		return $this->hasMany('\\'.$model, $key, 'id');
	}

}
