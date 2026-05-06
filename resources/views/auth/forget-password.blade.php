@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl border border-slate-100 shadow-sm text-center">
        <h2 class="text-2xl font-extrabold text-slate-900">Reset Password</h2>
        <p class="text-sm text-slate-500">Masukkan email atau username. Admin akan menghubungi Anda.</p>
        
        <form class="mt-8 space-y-6" action="#" method="POST">
            @csrf
            <div>
                <input name="identifier" type="text" required class="w-full px-3 py-2 border border-slate-300 rounded text-sm" placeholder="Email / Username">
            </div>
            <button type="button" onclick="alert('Fitur ini masih dalam tahap pengembangan.')" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-slate-700 bg-slate-100 hover:bg-slate-200">
                Kirim Permintaan Reset
            </button>
        </form>
        <a href="{{ route('login') }}" class="block mt-4 text-sm text-blue-600 hover:underline">Kembali ke Login</a>
    </div>
</div>
@endsection