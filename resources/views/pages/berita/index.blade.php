@extends('layouts.app')

@section('content')
<div class="bg-slate-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight sm:text-5xl">
                Kabar & Pengumuman HMIT
            </h1>
            <p class="mt-4 text-lg text-slate-500">
                Ikuti perkembangan terbaru kegiatan mahasiswa, agenda akademik, serta informasi penting dari Himpunan Mahasiswa Informatika UTS.
            </p>
        </div>

        @if($news->isEmpty())
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v6a2 2 0 01-2 2h-2m-6-16l6 6m0 0L21 8M12 11h3m-3 4h2M5 8h2m-2 4h3m-3 4h3" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">Belum ada berita</h3>
                <p class="mt-1 text-sm text-slate-500">Nantikan informasi terbaru dari kami segera.</p>
            </div>
        @else
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($news as $article)
                    <article class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300 flex flex-col h-full">
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center justify-between text-xs font-semibold text-blue-600 mb-3 uppercase tracking-wider">
                                <span>{{ $article->category }}</span>
                                <span class="text-slate-400 font-normal">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h2 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 hover:text-blue-600">
                                <a href="{{ route('berita.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-4 flex-grow">
                                {{ strip_tags($article->content) }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <a href="{{ route('berita.show', $article->slug) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    Baca Selengkapnya
                                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
