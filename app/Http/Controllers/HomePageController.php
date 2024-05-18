<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function login()
    {
        return view('userlogin');
    }

    public function postLogin(Request $request) 
    {
        $cre = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*if (Auth::attempt($cre)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
            //dd('chuẩn');
        } else {
            //dd('sai');
            return back()->withErrors(['login_error' => 'Tài khoản hoặc mật khẩu không đúng']);
        }*/

        /*if (Auth::guard('member')->attempt($cre)) {
            $request->session()->regenerate();
            $request->session()->put('member', Auth::guard('member')->user());

            return redirect()->route('index')->intended();
            //dd('chuẩn');
        } else {
            //dd('sai');
            return back()->withErrors(['login_error' => 'Tài khoản hoặc mật khẩu không đúng']);
        }*/
        if (auth('member')->attempt($cre)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');  
            //dd('chuẩn');
        } else {
            //dd('sai');
            return back()->withErrors(['login_error' => 'Tài khoản hoặc mật khẩu không đúng']); 
        }
    }

    public function oldlogin(Request $request) {

        $messages = [
            'username.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ];
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        $name = $request->username;
        $pass = $request->password;

        $user = Member::where([
            'email' => $name,
            'password' => Hash::make($pass),
        ])->get();

        if ($user) {
            $id = Member::where([
                'email' => $name,
                'password' => $pass
            ])->get('id');
            setcookie('is_logged', 1, time() + 360000, '/');
            setcookie('id', $id, time() + 360000, '/');
            //Auth::guard('member')->login($user);
            return redirect()->route('index');
            //dd('user', 'id');
        } else {
            return back()->withErrors(['login_error' => 'Tài khoản hoặc mật khẩu không đúng']);
        }

    }

    public function oldregister(Request $request) {
        $messages = [
            'fullname.required' => 'Họ Và Tên Không Được Bỏ Trống',
            'password.required' => 'Mật Khẩu Không Được Bỏ Trống.',
            'password.min' => 'Mật Khẩu Phải Trên 8 ký tự.',
            'repassword.same' => 'Mật Khẩu Không Khớp.',
            'phone.required' => 'Số Điện Thoại Không Được Bỏ Trống.',
            'phone.alpha_num' => 'Số Điện Thoại Phải Là Dữ Liệu Số.',
            'phone.digits' => 'Số Điện Thoại Phải Đủ 10 Chữ Số.',
            'email.required' => 'Email không được bỏ trống',
        ];
        $this->validate($request, [
            
            'fullname' => 'required',
            'password' => 'required|min:8',
            'repassword' => 'same:password',
            'phone' => 'required|alpha_num',
            'email' => 'required',
        ], $messages);

        //$MaNV = time();
        $fullname = $request->fullname;
        $password = $request->password;
        $phone = $request->phone;
        $email = $request->email;



        $check = Member::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $fullname,
            'address' => '',
            'phone' => $phone,
            'email_verified_at' => now(),
            'remember_token' => '',
            'role_id' => 2,
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null
        ]);

        if($check) {
            return redirect()->route('dangnhap')->with('success', 'Đăng ký thành công.');
        } else {
            return redirect()->route('dangki')->with('fail', 'Đăng ký thất bại.');
        }


    }

    public function register(Request $request) 
    {
        dd('test');
    }

    public function postRegister(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email_verified_at' => now(),
            'remember_token' => '',
            'role_id' => 2,
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null
        ]);

        dd($user);
    }

    public function oldlogout()
    {
        setcookie('is_logged', 0, time() - 360000, '/');
        setcookie('is_logged', 0, time() + 360000, '/');
        return redirect()->route('index');
    }
}
