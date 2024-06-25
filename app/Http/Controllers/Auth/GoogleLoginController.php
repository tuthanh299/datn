<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /*public function redirect ($provider)
    {
        return Socialite::driver($provider)->redirect();
    }*/

    public function redirect ()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback ()
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
            $socialuser = Socialite::driver('google')->user();
            /*if(Member::where('email', $socialuser->getEmail())->exists())
            {
                return redirect()->route('user.login')->withErrors(['email' => 'Email đã đăng nhập']);
            }*/
            $user = Member::where([
                'email' => $socialuser->getEmail(),
            ])->first();
            if(!$user) {
                $user = Member::create([
                    'first_name' => $socialuser->getName(),
                    'last_name' => $socialuser->getName(),
                    'email' => $socialuser->getEmail(),
                    'phone' => '',
                    'address' => '',
                    'password' => '',
                    'google_id' => $socialuser->getId(),
                    //'provider_token' => $socialuser->token,
                    'email_verified_at' => now(),
                ]);

                $member = Member::where('email', $socialuser->getEmail())->first();

                Cart::create([
                    'member_id' => $member->id,
                    'cart_total' => 0,
                ]);

                Auth::guard('member')->login($user);
                return redirect('/');
            } else {
                Auth::guard('member')->login($user);
                return redirect('/');
            }
            //dd($user);
            //Auth::guard('member')->login($user);
            //return redirect()->route('user.login')->with('fail', 'Đăng nhập thất bại');
        } catch (\Exception $e) {
            //return redirect()->route('user.login');
            dd('Đã có lỗi xảy ra, ' . $e);
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
