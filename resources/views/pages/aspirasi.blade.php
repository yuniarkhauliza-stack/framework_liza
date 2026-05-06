@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-slate-900">Ruang Aspirasi HMIT</h1>
        <p class="mt-3 text-slate-500">Suarakan ide, kritik, dan saran untuk kemajuan prodi Informatika UTS.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-md text-sm font-medium border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Aturan Section -->
        <div class="col-span-1 bg-slate-50 p-6 rounded-xl border border-slate-200 h-fit">
            <h3 class="font-semibold text-slate-800 mb-4">Tata Cara & Aturan</h3>
            <ul class="text-sm text-slate-600 space-y-3 list-disc list-inside">
                <li>Gunakan bahasa yang sopan dan jelas.</li>
                <li>Fokus pada permasalahan atau solusi.</li>
                <li>Pilih tujuan aspirasi yang tepat.</li>
                <li>Aspirasi akan diverifikasi oleh pengurus HMIT sebelum ditindaklanjuti.</li>
            </ul>
        </div>

        <!-- Form Section -->
        <div class="col-span-2 bg-white p-8 rounded-xl shadow-sm border border-slate-100">
            <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                        <input name="nama" type="text" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nama Anda">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Angkatan</label>
                        <input name="angkatan" type="number" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Contoh: 2024">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Tujuan Aspirasi</label>
                    <select name="tujuan" required class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>-- Pilih Tujuan --</option>
                        <option value="Dosen">Dosen / Akademik</option>
                        <option value="Fasilitas">Fasilitas Kampus</option>
                        <option value="Program Studi">Program Studi / Kurikulum</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Isi Aspirasi</label>
                    <textarea name="isi" rows="5" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Tuliskan aspirasi Anda di sini..."></textarea>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition">
                        Kirim Aspirasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection