<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Controllers\SliderController;

class IndexController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::all();
        return view('index',compact('sliders'));
    }
     
}
