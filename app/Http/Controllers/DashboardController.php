<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user) {
            //return redirect()->route('admin.login');
            return view('admin.dashboard.dashboard', compact('user'));
        }
        //return view('admin.dashboard.dashboard');
        return redirect()->route('admin.login');
    }

}
