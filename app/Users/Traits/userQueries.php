<?php

namespace App\Users\Traits;

trait UserQueries
{
	public function registerNew($request)
	{
		$user = $this->register($request);

		$user->companyOwners()->create([
			'plan_id' => 1,
			'uid' => uniqid(true),
			'slug' => str_slug($request->company_name),
			'name' => $request->company_name,
			'email' => $request->company_email,
			'url' => $request->company_url,
		]);

		return $user;
	}

	public function registerInvited($request)
	{
		$user = $this->register($request);
	}

	protected function register($request)
	{
		return $this->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
			if($request->has('invited') || $request->has('socail')) {
				'activated' => 1,
			}
		]);
	}
}