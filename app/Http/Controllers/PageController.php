<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderShipped;

class PageController extends Controller
{
    public function socket()
    {
        return view('page.socket');
    }

    public function channel()
    {
        event(new OrderShipped());
        return view('page.channel');
    }
}
