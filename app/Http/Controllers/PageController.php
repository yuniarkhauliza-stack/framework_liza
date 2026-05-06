<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    public function home() {
        return view('pages.home');
    }

    public function dashboard() {
        return view('pages.dashboard');
    }
}