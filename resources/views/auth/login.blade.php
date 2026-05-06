@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl border border-slate-100 shadow-sm">
        <div>
            <h2 class="mt-2 text-center text-3xl font-extrabold text-slate-900">Masuk Akun</h2>
            <p class="mt-2 text-center text-sm text-slate-600">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Daftar disini</a>
            </p>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-700 p-3 rounded text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm mt-1" placeholder="Masukkan username">
                    @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm mt-1" placeholder="Masukkan password">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500"> Lupa password? </a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    Masuk
                </button>
            </div>
        </form>

        <div class="mt-6 border-t border-slate-200 pt-4">
            <h3 class="text-sm font-semibold text-slate-800">Langkah Login:</h3>
            <ul class="mt-2 text-xs text-slate-500 list-disc list-inside space-y-1">
                <li>Gunakan <b>Username</b> yang didaftarkan.</li>
                <li>Masukkan password dengan benar.</li>
                <li>Jika belum terdaftar, silakan ke halaman Register.</li>
            </ul>
        </div>
    </div>
</div>
@endsection