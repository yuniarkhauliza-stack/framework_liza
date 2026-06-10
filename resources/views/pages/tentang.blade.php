@extends('layouts.app')

@section('content')
<div class="bg-slate-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight sm:text-5xl">
                Pengurus HMIT UTS
            </h1>
            <p class="mt-4 text-lg text-slate-500">
                Kenali kabinet kepengurusan Himpunan Mahasiswa Informatika Universitas Teknologi Sumbawa periode saat ini. Sinergi mewujudkan inovasi teknologi.
            </p>
        </div>

        @if(empty($groupedMembers))
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">Belum ada data pengurus</h3>
                <p class="mt-1 text-sm text-slate-500">Struktur organisasi sedang dalam proses pembaharuan.</p>
            </div>
        @else
            <!-- Loop through departments -->
            @foreach($groupedMembers as $department => $members)
                <div class="mb-16">
                    <div class="border-b border-slate-200 pb-4 mb-8">
                        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">
                            {{ $department }}
                        </h2>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($members as $member)
                            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 text-center hover:shadow-md transition">
                                <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-2xl border border-blue-100">
                                    {{ strtoupper(substr($member->name, 0, 2)) }}
                                </div>
                                <h3 class="font-bold text-slate-900 text-lg leading-tight mb-1">
                                    {{ $member->name }}
                                </h3>
                                <p class="text-sm font-medium text-blue-600 mb-2">
                                    {{ $member->position }}
                                </p>
                                <div class="text-xs text-slate-400">
                                    <p>NIM. {{ $member->nim }}</p>
                                    <p>Angkatan {{ $member->generation }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
