@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center space-x-2 text-sm text-slate-500 mb-6">
        <a href="{{ route('admin.berita.index') }}" class="hover:text-blue-600">Kelola Berita</a>
        <span>/</span>
        <span class="text-slate-900 font-medium">Edit Berita</span>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-2">Edit Berita</h1>
        <p class="text-sm text-slate-500 mb-8">Teknik: <span class="font-semibold text-blue-600">Query Builder</span></p>

        <form action="{{ route('admin.berita.update', $article->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-1">Judul Berita</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select name="category" id="category" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror">
                    <option value="" disabled>Pilih Kategori</option>
                    <option value="Pengumuman" {{ old('category', $article->category) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="Kegiatan" {{ old('category', $article->category) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Prestasi" {{ old('category', $article->category) == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                    <option value="Akademik" {{ old('category', $article->category) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="Lainnya" {{ old('category', $article->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-semibold text-slate-700 mb-1">Konten Berita</label>
                <textarea name="content" id="content" rows="10" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Publish Checkbox -->
            <div class="flex items-center">
                <input type="checkbox" name="publish" id="publish" value="1" {{ old('publish', $article->published_at !== null) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded">
                <label for="publish" class="ml-2 block text-sm text-slate-900 font-semibold select-none">
                    Publikasikan Berita
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.berita.index') }}" class="px-4 py-2 border border-slate-300 rounded-md text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
