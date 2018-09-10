<?php

namespace App\Service\Model\Category;

trait Relationship {

	private function Category ($model, $key)
	{
		return $this->hasMany('\\'.$model, $key, 'id');
	}

}
