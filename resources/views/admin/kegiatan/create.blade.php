@extends('layouts.admin')

@section('header_title', 'Tambah Kegiatan Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Form Header -->
        <div class="p-6 bg-slate-50 border-b border-slate-200">
            <h3 class="text-lg font-bold text-slate-800">Tambah Kegiatan Baru</h3>
            <p class="text-sm text-slate-500 mt-1">Buat dokumentasi kegiatan atau berita baru untuk dipublikasikan.</p>
        </div>

        <!-- Form Content -->
        <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            <!-- Judul -->
            <div class="space-y-2">
                <label for="judul" class="block text-sm font-bold text-slate-700">Judul Kegiatan</label>
                <input 
                    type="text" 
                    name="judul" 
                    id="judul" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('judul') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Contoh: Peringatan Hari Santri Nasional"
                    value="{{ old('judul') }}"
                    required>
                @error('judul')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2">
                <label for="deskripsi" class="block text-sm font-bold text-slate-700">Deskripsi Kegiatan</label>
                <textarea 
                    name="deskripsi" 
                    id="deskripsi" 
                    rows="6" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('deskripsi') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Tulis detail deskripsi kegiatan..."
                    required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Foto -->
            <div class="space-y-2">
                <label for="foto" class="block text-sm font-bold text-slate-700">Foto Kegiatan</label>
                <input 
                    type="file" 
                    name="foto" 
                    id="foto" 
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-300 rounded-lg p-1.5 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 @error('foto') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    accept="image/*"
                    required>
                @error('foto')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Format file yang diperbolehkan: JPEG, PNG, JPG (Maks. 2MB).</p>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.kegiatan.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition duration-150">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-md transition duration-150 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Simpan Kegiatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
