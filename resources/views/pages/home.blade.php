@extends('layouts.app')

@section('content')
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Sinergi & Inovasi</span>
                        <span class="block text-blue-600">Informatika UTS</span>
                    </h1>
                    <p class="mt-3 text-base text-slate-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Selamat datang di portal resmi Himpunan Mahasiswa Informatika (HMIT) Universitas Teknologi Sumbawa. Mari bersama membangun ekosistem teknologi yang inklusif dan progresif.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg transition">
                                Gabung Sekarang
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('aspirasi') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg transition">
                                Sampaikan Aspirasi
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<div class="bg-slate-50 py-16 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kabar Terbaru</h2>
                <p class="mt-2 text-slate-500 max-w-xl">Informasi, agenda, dan berita kegiatan terupdate dari Himpunan Mahasiswa Informatika UTS.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
                Lihat Semua Berita
                <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        @if($latestNews->isEmpty())
            <div class="bg-white rounded-lg p-8 text-center border border-slate-200">
                <p class="text-slate-500">Belum ada kabar terbaru.</p>
            </div>
        @else
            <div class="grid gap-8 md:grid-cols-3">
                @foreach($latestNews as $article)
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col h-full hover:shadow-md transition">
                        <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider mb-2 block">{{ $article->category }}</span>
                        <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-2 hover:text-blue-600">
                            <a href="{{ route('berita.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-3 flex-grow">{{ strip_tags($article->content) }}</p>
                        <a href="{{ route('berita.show', $article->slug) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 mt-auto inline-flex items-center">
                            Baca Selengkapnya
                            <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection