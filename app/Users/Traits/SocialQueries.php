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
		return $this->{$provider}($social);
	}

	protected function facebook($social)
	{
		$facebook = [
			'provider' => 'facebook',
			'provider_user_id' => $social->id,
			'name' => $social->name,
			'email' => $social->email,
			'avatar_url' => $social->avatar,
			'profile_url' => $social->profileUrl,
		];
		return $this->updateOrCreate($facebook);
	}

	protected function github($social)
	{
		$user = $social->user;
		$github = [
			'provider' => 'github',
			'provider_user_id' => $user['id'],
			'name' => $user['login'],
			'email' => $user['email'],
			'avatar_url' => $user['avatar_url'],
			'profile_url' => $user['url'],
		];
		return $this->updateOrCreate($github);
	}

	protected function google($social)
	{
		$google = [
			'provider' => 'google',
			'provider_user_id' => $social->id,
			'name' => $social->name,
			'email' => $social->email,
			'avatar_url' => $social->avatar,
			'profile_url' => $social->user['url'],
		];
		return $this->updateOrCreate($google);
	}

	protected function updateOrCreate(array $data)
	{
		$exists = $this->where('provider', $data['provider'])
			->where('provider_user_id', $data['provider_user_id'])
			->first();

		if($exists) {
			$exists->update($data);
			if($exists->user_id > 0) {
				auth()->loginUsingId($exists->user_id);
			}
		} else {
			if($current = $this->where('email', $data['email'])->first()) {
				$data = array_add($data, 'user_id', $current->user_id);
				auth()->loginUsingId($current->user_id);
			}
			$exists = $this->create($data);
		}
		return $exists;
	}
}
