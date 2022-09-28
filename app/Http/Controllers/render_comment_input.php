<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class render_comment_input extends Controller
{
    public function index()
    {
        return view('components.input_box')->render();
    }
}
