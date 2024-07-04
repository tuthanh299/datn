<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CUserController extends Controller
{
    public function clientLogin()
    {
        //return view('client.login');
        return view('client.user.login');
    }
    public function clientRegister()
    {
        //return view('client.register');
        return view('client.user.register');
    }

    public function postlogin(LoginRequest $request)
    {
        /*$credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);*/

        $cre = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($cre)) {
            $user = Auth::guard('member')->user();
            Auth::guard('member')->login($user);
            $request->session()->put('user_id', Auth::guard('member')->user()->id);
            //$request->session()->regenerate();
            return redirect()->route('index');
            //dd('đúng');
            //dd($user);
        }
        //$email = $request->input('email');
        //$password = $request->input('password');

        /*$check = [
        ['email', '=', $email],
        //['password', '=', $password]
        ];

        $user = Member::where($check)->get();

        if(Hash::check($password, $user[0]->password)){
        return redirect()->route('index');
        }*/

        /*if($user)
        {
        $is_logged = 1;
        $id = $user->id;
        setcookie('is_logged', $is_logged, time() + 360000, '/');
        setcookie('id', $id, time() + 360000, '/');
        return redirect()->route('index');
        }*/
        return redirect()->route('user.login')->with('fail', 'Tài khoản hoặc mật khẩu không chính xác.');

        //dd(Auth::guard('member')->attempt($credentials));

        //dd(Hash::make('123456'));

        //dd($user);
        //dd(Hash::make('123456'));
    }

    public function postregister(RegisterRequest $request)
    {
        /*$cre = $request->validate([
        'firstname' => ['required', 'string', 'max:20'],
        'lastname' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email'],
        'password' => ['required'],
        'confirm-password' => ['required'],
        'address' => ['required'],
        'phone' => ['required']
        ]);*/

        $cre = $request->all();

        if ($cre) {
            Member::create([
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $member = Member::where('email', $request->email)->first();

            Cart::create([
                'member_id' => $member->id,
                'cart_total' => 0,
            ]);

            return redirect()->route('user.login')->with('success', 'Đăng ký thành công');
            //dd($cre, 'true');
        }
        return redirect()->route('user.register')->with('fail', 'Đã có lỗi xảy ra');
        //dd($cre, 'false');
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('index');
    }
}
