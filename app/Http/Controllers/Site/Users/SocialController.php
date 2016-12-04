<?php

namespace App\Http\Controllers\Site\Users;

use Socialite;
use App\Users\Models\Social;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Social $social)
    {
        $social = $social->handle(Socialite::driver($provider)->user(), $provider);

        if(auth()->check()) {
            return redirect()->route('profile.edit', auth()->user());
        } 
        return view('user.social.register', compact('social'));
    }
}
