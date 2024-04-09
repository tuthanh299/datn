<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Staticnews;
use function Laravel\Prompts\error;
class StaticNewsController extends Controller
{
    private $staticnews;
    public function __construct(Staticnews $staticnews)
    {
        $this->staticnews = $staticnews;
    }
    public function index()
    {
        $staticnews = $this->staticnews->first();
        return view('admin.aboutus.index', compact('staticnews'));
    }

}
