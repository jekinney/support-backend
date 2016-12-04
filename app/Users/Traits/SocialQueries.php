<?php

namespace App\Users\Traits;

use App\Users\Models\User;

trait SocialQueries
{
	public function registerUser($request)
	{
		$social = $this->where('provider_user_id', $request->provider_user_id)->first();

		$user = User::create([
			'name' => $request->name,
			'email' => $social->email,
			'password' => $request->password,
			'activated' => 1,
		]);

		$socials = $this->where('email', $social->email)->get();
		foreach($socials as $social) {
			$social->update(['user_id' => $user->id]);
		}

		return auth()->login($user);
	}
	public function handle($social, $provider)
	{
		$data = [
			'provider' => $provider,
			'provider_user_id' => $social->getId(),
			'name' => $social->getName(),
			'email' => $social->getEmail(),
			'avatar_url' => $social->getAvatar(),
		];

		$exists = $this->where('provider', $provider)
			->where('provider_user_id', $social->getId())
			->first();

		if($exists) {
			$exists->update($data);
			if($exists->user_id > 0) {
				auth()->loginUsingId($exists->user_id);
			}
		} else {
			if($current = $this->where('email', $social->getEmail())->first()) {
				$data = array_add($data, 'user_id', $current->user_id);
				auth()->loginUsingId($current->user_id);
			}
			$exists = $this->create($data);
		}
		return $exists;
	}
}