<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialProvider;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        
        $social_auth = SocialProvider::firstOrCreate([
        	'name' => $provider,
        	'provider_id' => $user->id,
        ], [
        	'name' => $provider,
        	'provider_id' => $user->id,
        ]);
    }
}
