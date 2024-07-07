<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CChangePasswordController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user(); 
            return view('client.info.changepassword', compact('user'));
        }
        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::guard('member')->user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->password);

        return redirect()->route('user.changepassword.index')->with('success', 'Đổi mật khẩu thành công.');
        //dd($user);
    }

}
