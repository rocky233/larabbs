<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected function root()
    {
        return view('pages.root');
    }
}
