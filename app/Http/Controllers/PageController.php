<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    public function home() {
        $latestNews = \Illuminate\Support\Facades\DB::table('news')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('pages.home', compact('latestNews'));
    }

    public function dashboard() {
        return view('pages.dashboard');
    }
}