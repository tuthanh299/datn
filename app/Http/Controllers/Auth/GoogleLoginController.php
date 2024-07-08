<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /*public function redirect ($provider)
    {
    return Socialite::driver($provider)->redirect();
    }*/

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
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
        }*//*catch (\Throwable $e) {
        //throw $th;
        return redirect('/login');
        //dd($e);
        }*/

        try {
            $socialuser = Socialite::driver('google')->user();

            // dd($socialuser->getRaw());
            /*if(Member::where('email', $socialuser->getEmail())->exists())
            {
            return redirect()->route('user.login')->withErrors(['email' => 'Email đã đăng nhập']);
            }*/
            $user = Member::where([
                'email' => $socialuser->getEmail(),
            ])->first();
            if (!$user) {
                /* New one */
                if (isset($socialuser->getRaw()['given_name']) && isset($socialuser->getRaw()['family_name'])) {
                    $dataUser['first_name'] = $socialuser->getRaw()['given_name'];
                    $dataUser['last_name'] = $socialuser->getRaw()['family_name'];
                } else {
                    $dataUser['first_name'] = $socialuser->getName();
                    $dataUser['last_name'] = $socialuser->getName();
                }
                $dataUser['email'] = $socialuser->getEmail();
                $dataUser['phone'] = '';
                $dataUser['address'] = '';
                $dataUser['password'] = '';
                $dataUser['google_id'] = $socialuser->getId();
                $dataUser['email_verified_at'] = now();
                $user = Member::create($dataUser);
                


                Auth::guard('member')->login($user);
                session()->put('user_id', Auth::guard('member')->user()->id);
                return redirect('/');
            } else {
                Auth::guard('member')->login($user);
                session()->put('user_id', Auth::guard('member')->user()->id);
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
