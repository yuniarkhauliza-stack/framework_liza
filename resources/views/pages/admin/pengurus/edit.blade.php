@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center space-x-2 text-sm text-slate-500 mb-6">
        <a href="{{ route('admin.pengurus.index') }}" class="hover:text-emerald-600">Kelola Pengurus</a>
        <span>/</span>
        <span class="text-slate-900 font-medium">Edit Pengurus</span>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-2">Edit Anggota Pengurus</h1>
        <p class="text-sm text-slate-500 mb-8">Teknik: <span class="font-semibold text-emerald-600">Raw SQL</span></p>

        <form action="{{ route('admin.pengurus.update', $member->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIM -->
                <div>
                    <label for="nim" class="block text-sm font-semibold text-slate-700 mb-1">NIM</label>
                    <input type="text" name="nim" id="nim" value="{{ old('nim', $member->nim) }}" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('nim') border-red-500 @enderror">
                    @error('nim')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Generation -->
                <div>
                    <label for="generation" class="block text-sm font-semibold text-slate-700 mb-1">Angkatan</label>
                    <input type="number" name="generation" id="generation" min="2010" max="{{ date('Y') }}" value="{{ old('generation', $member->generation) }}" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('generation') border-red-500 @enderror">
                    @error('generation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Position -->
                <div>
                    <label for="position" class="block text-sm font-semibold text-slate-700 mb-1">Jabatan</label>
                    <input type="text" name="position" id="position" placeholder="Contoh: Ketua Himpunan, Sekretaris" value="{{ old('position', $member->position) }}" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('position') border-red-500 @enderror">
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department -->
                <div>
                    <label for="department" class="block text-sm font-semibold text-slate-700 mb-1">Divisi / Departemen</label>
                    <select name="department" id="department" required class="w-full px-4 py-2 rounded-md border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('department') border-red-500 @enderror">
                        <option value="" disabled>Pilih Divisi</option>
                        <option value="BPH (Badan Pengurus Harian)" {{ old('department', $member->department) == 'BPH (Badan Pengurus Harian)' ? 'selected' : '' }}>BPH (Badan Pengurus Harian)</option>
                        <option value="Divisi Ristek (Riset & Teknologi)" {{ old('department', $member->department) == 'Divisi Ristek (Riset & Teknologi)' ? 'selected' : '' }}>Divisi Ristek (Riset & Teknologi)</option>
                        <option value="Divisi Humas (Hubungan Masyarakat)" {{ old('department', $member->department) == 'Divisi Humas (Hubungan Masyarakat)' ? 'selected' : '' }}>Divisi Humas (Hubungan Masyarakat)</option>
                        <option value="Divisi Kesenian & Olahraga" {{ old('department', $member->department) == 'Divisi Kesenian & Olahraga' ? 'selected' : '' }}>Divisi Kesenian & Olahraga</option>
                        <option value="Divisi PSDM (Pengembangan Sumber Daya Mahasiswa)" {{ old('department', $member->department) == 'Divisi PSDM (Pengembangan Sumber Daya Mahasiswa)' ? 'selected' : '' }}>Divisi PSDM (Pengembangan Sumber Daya Mahasiswa)</option>
                    </select>
                    @error('department')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.pengurus.index') }}" class="px-4 py-2 border border-slate-300 rounded-md text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md text-sm font-medium hover:bg-emerald-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
