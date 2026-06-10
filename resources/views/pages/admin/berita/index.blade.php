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
            <h1 class="text-2xl font-bold text-slate-900">Kelola Berita & Pengumuman</h1>
            <p class="text-slate-500 text-sm mt-1">Menggunakan teknik <span class="font-semibold text-blue-600">Query Builder</span></p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-slate-300 text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 transition">
                Kembali ke Dashboard
            </a>
            <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
                Tulis Berita Baru
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        @if($news->isEmpty())
            <div class="p-12 text-center">
                <p class="text-slate-500">Belum ada berita yang ditulis.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs text-slate-700 uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-4">Judul</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Tanggal Dibuat</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($news as $article)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold text-slate-900 max-w-xs truncate">
                                    {{ $article->title }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-800">
                                        {{ $article->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($article->published_at)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                            Dipublikasikan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                            Draf
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-right flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.berita.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                    
                                    <form action="{{ route('admin.berita.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
