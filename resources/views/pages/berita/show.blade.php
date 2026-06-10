@extends('layouts.app')

@section('content')
<div class="bg-slate-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ route('berita.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-8 transition">
            <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Berita
        </a>

        <article class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden p-8 md:p-12">
            <!-- Meta Info -->
            <div class="flex items-center space-x-4 text-sm text-slate-400 mb-6 font-medium">
                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                    {{ $article->category }}
                </span>
                <span>•</span>
                <span>{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y H:i') }} WIB</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-8">
                {{ $article->title }}
            </h1>

            <!-- Content -->
            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed space-y-6 text-base md:text-lg">
                {!! nl2br(e($article->content)) !!}
            </div>
        </article>
    </div>
</div>
@endsection
