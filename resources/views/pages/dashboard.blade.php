@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-8">
            <h1 class="text-2xl font-bold text-slate-900">Dashboard Mahasiswa</h1>
            <p class="mt-2 text-slate-600">Selamat datang, <span class="font-semibold">{{ auth()->user()->nama_lengkap }}</span>!</p>
            
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <h3 class="font-semibold text-blue-900">Profil Akademik</h3>
                    <p class="text-sm text-blue-700 mt-2">Angkatan: {{ auth()->user()->angkatan }}</p>
                    <p class="text-sm text-blue-700">Kelas: {{ auth()->user()->kelas }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="font-semibold text-slate-900">Kelola Berita</h3>
                        <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold text-blue-600">Query Builder</p>
                        <p class="text-sm text-slate-600 mt-2">Buat, perbarui, dan hapus pengumuman serta berita himpunan HMIT UTS.</p>
                    </div>
                    <a href="{{ route('admin.berita.index') }}" class="mt-4 bg-blue-600 text-white text-center py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">
                        Kelola Berita
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="font-semibold text-slate-900">Kelola Pengurus</h3>
                        <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold text-emerald-600">Raw SQL</p>
                        <p class="text-sm text-slate-600 mt-2">Atur daftar anggota pengurus aktif dan divisi/departemen HMIT UTS.</p>
                    </div>
                    <a href="{{ route('admin.pengurus.index') }}" class="mt-4 bg-emerald-600 text-white text-center py-2 rounded-md text-sm font-medium hover:bg-emerald-700 transition">
                        Kelola Pengurus
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection