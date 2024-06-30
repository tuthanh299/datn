<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CContactController extends Controller
{
    public function index()
    {

        return View('client.contact.index');
    }
}
