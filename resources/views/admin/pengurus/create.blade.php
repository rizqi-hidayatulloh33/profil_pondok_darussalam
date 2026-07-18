@extends('layouts.admin')

@section('header_title', 'Tambah Pengurus Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Form Header -->
        <div class="p-6 bg-slate-50 border-b border-slate-200">
            <h3 class="text-lg font-bold text-slate-800">Tambah Anggota Pengurus</h3>
            <p class="text-sm text-slate-500 mt-1">Masukkan data anggota kepengurusan baru untuk ditampilkan di struktur bagan.</p>
        </div>

        <!-- Form Content -->
        <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            <!-- Nama -->
            <div class="space-y-2">
                <label for="nama" class="block text-sm font-bold text-slate-700">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="nama" 
                    id="nama" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('nama') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Contoh: KH. Ahmad Darussalam"
                    value="{{ old('nama') }}"
                    required>
                @error('nama')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="space-y-2">
                <label for="jabatan" class="block text-sm font-bold text-slate-700">Jabatan / Posisi</label>
                <input 
                    type="text" 
                    name="jabatan" 
                    id="jabatan" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('jabatan') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Contoh: Pengasuh / Ketua Pengurus / Bendahara"
                    value="{{ old('jabatan') }}"
                    required>
                @error('jabatan')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Periode / Masa Jabatan -->
            <div class="space-y-2">
                <label for="periode" class="block text-sm font-bold text-slate-700">Masa Jabatan / Periode</label>
                <input 
                    type="text" 
                    name="periode" 
                    id="periode" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('periode') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Contoh: 2024-2029"
                    value="{{ old('periode') }}"
                    required>
                @error('periode')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Level Hierarki / Urutan Bagaan -->
            <div class="space-y-2">
                <label for="level_hierarki" class="block text-sm font-bold text-slate-700">Tingkat Hierarki (Urutan Tampilan)</label>
                <input 
                    type="number" 
                    name="level_hierarki" 
                    id="level_hierarki" 
                    min="1"
                    max="100"
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 @error('level_hierarki') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    value="{{ old('level_hierarki', 1) }}"
                    required>
                @error('level_hierarki')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Nilai 1 untuk tingkat tertinggi (misal: Pengasuh), nilai lebih tinggi untuk posisi di bawahnya. Pengurus dengan nilai yang sama akan sejajar dalam satu baris bagan.</p>
            </div>

            <!-- Upload Foto -->
            <div class="space-y-2">
                <label for="foto" class="block text-sm font-bold text-slate-700">Foto Pengurus</label>
                <input 
                    type="file" 
                    name="foto" 
                    id="foto" 
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-300 rounded-lg p-1.5 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 @error('foto') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    accept="image/jpeg,image/png,image/jpg">
                @error('foto')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Format file yang diperbolehkan: JPEG, PNG, JPG (Maks. 2MB). Kosongkan jika belum ada foto.</p>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.pengurus.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition duration-150">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-md transition duration-150 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Simpan Pengurus
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
