<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logoutAdmin(Request $request)
    {
        $request->session()->forget(['type','user']);
        // $request->session()->flush();
        Auth::logout();

        return redirect('/login');
    }
}
