@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl border border-slate-100 shadow-sm">
        <div>
            <h2 class="mt-2 text-center text-3xl font-extrabold text-slate-900">Registrasi Akun</h2>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Username</label>
                    <input name="username" type="text" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input name="password" type="password" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-slate-700">Angkatan</label>
                        <input name="angkatan" type="number" placeholder="2024" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-slate-700">Kelas</label>
                        <select name="kelas" required class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="A">Kelas A</option>
                            <option value="B">Kelas B</option>
                            <option value="C">Kelas C</option>
                            <option value="D">Kelas D</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>
    </div>
</div>
@endsection