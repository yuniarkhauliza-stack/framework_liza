<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController
{
    public function index() {
        return view('pages.aspirasi');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'required|digits:4|integer',
            'tujuan' => 'required|in:Dosen,Fasilitas,Program Studi,Lainnya',
            'isi' => 'required|string',
        ]);

        Aspirasi::create($validated);

        return back()->with('success', 'Aspirasi berhasil dikirim! Terima kasih atas partisipasi Anda.');
    }
}