<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            $account = User::where('email', $request->email)->get();
            session(['user' => $account]);
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home');
            } 
            else if (auth()->user()->type == 'manager') {
                return redirect()->route('manager.home');
            } else {
                return redirect()->route('user.login');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Tài khoản email hoặc mật khẩu không đúng.');
        }

    }

}
