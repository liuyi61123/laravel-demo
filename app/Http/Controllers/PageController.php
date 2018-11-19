<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function socket()
    {
        return view('page.socket');
    }

    public function channel()
    {
        return view('page.channel');
    }
}
