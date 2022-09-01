<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages_controller extends Controller
{
    public function home_page()
    {
        return view('home_page');
    }
}
