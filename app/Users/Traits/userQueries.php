<?php

namespace App\Users\Traits;

trait UserQueries
{
	public function register($request)
	{
		return $this->create($request->all());
	}
}