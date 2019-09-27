<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    protected function root()
    {
        return view('pages.root');
    }
}
