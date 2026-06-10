@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg p-4 text-sm flex items-center justify-between shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Kelola Pengurus HMIT</h1>
            <p class="text-slate-500 text-sm mt-1">Menggunakan teknik <span class="font-semibold text-emerald-600">Raw SQL</span></p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-slate-300 text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 transition">
                Kembali ke Dashboard
            </a>
            <a href="{{ route('admin.pengurus.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition">
                Tambah Anggota Pengurus
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        @if(empty($members))
            <div class="p-12 text-center">
                <p class="text-slate-500">Belum ada data pengurus yang dimasukkan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs text-slate-700 uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-4">Nama</th>
                            <th class="px-6 py-4">NIM</th>
                            <th class="px-6 py-4">Jabatan</th>
                            <th class="px-6 py-4">Divisi / Departemen</th>
                            <th class="px-6 py-4">Angkatan</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($members as $member)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold text-slate-900">
                                    {{ $member->name }}
                                </td>
                                <td class="px-6 py-4 font-mono text-slate-500">
                                    {{ $member->nim }}
                                </td>
                                <td class="px-6 py-4 text-slate-700">
                                    {{ $member->position }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                        {{ $member->department }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $member->generation }}
                                </td>
                                <td class="px-6 py-4 text-right flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.pengurus.edit', $member->id) }}" class="text-emerald-600 hover:text-emerald-800 font-semibold">Edit</a>
                                    
                                    <form action="{{ route('admin.pengurus.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengurus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
