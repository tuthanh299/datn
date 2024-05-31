<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class ProviderController extends Controller
{
    public function redirect ($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback ($provider)
    {
        /*try {
            $socialuser = Socialite::driver($provider)->user();
            if(User::where('email', $socialuser->getEmail())->exists())
            {
                return redirect('/login')->withErrors(['email' => 'Email đã đăng nhập']);
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialuser->id,
            ])->first();
            if(!$user) {
                $user = User::create([
                    'name' => $socialuser->getName(),
                    'email' => $socialuser->getEmail(),
                    'phone' => '',
                    'address' => '',
                    'password' => '',
                    'provider' => $provider,
                    'provider_id' => $socialuser->getId(),
                    'provider_token' => $socialuser->token,
                    'email_verified_at' => now(),
                ]);
            }
            //dd($user);
            Auth::login($user);
            return redirect('/');
        }*/ /*catch (\Throwable $e) {
            //throw $th;
            return redirect('/login');
            //dd($e);
        }*/

        try {
            $socialuser = Socialite::driver($provider)->user();
            if(Member::where('email', $socialuser->getEmail())->exists())
            {
                return redirect('/login')->withErrors(['email' => 'Email đã đăng nhập']);
            }
            $user = Member::where([
                'provider' => $provider,
                'provider_id' => $socialuser->id,
            ])->first();
            if(!$user) {
                $user = Member::create([
                    'name' => $socialuser->getName(),
                    'email' => $socialuser->getEmail(),
                    'phone' => '',
                    'address' => '',
                    'password' => '',
                    'provider' => $provider,
                    'provider_id' => $socialuser->getId(),
                    'provider_token' => $socialuser->token,
                    'email_verified_at' => now(),
                ]);
            }
            //dd($user);
            //Auth::login($user);
            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/login');
        }

       /* $user = User::updateOrCreate([
            'provider_id' => $socialuser->id,
            'provider' => $provider,
        ], [
            'name' => $socialuser->name,
            'email' => $socialuser->email,
            'provider_token' => $socialuser->token,
        ]);
     
        Auth::login($user);
     
        return redirect('/dashboard');*/


    }
}
