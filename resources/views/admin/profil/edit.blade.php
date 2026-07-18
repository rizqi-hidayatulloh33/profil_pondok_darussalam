@extends('layouts.admin')

@section('header_title', 'Kelola Profil Pesantren')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
        <!-- Form Header -->
        <div class="p-6 bg-slate-50 border-b border-slate-200">
            <h3 class="text-lg font-bold text-slate-800">Edit Sejarah & Visi Misi</h3>
            <p class="text-sm text-slate-500 mt-1">Perbarui informasi profil dasar Pondok Pesantren Darussalam yang akan tampil pada website utama.</p>
        </div>

        <!-- Form Content -->
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Sejarah Input -->
            <div class="space-y-2">
                <label for="sejarah" class="block text-sm font-bold text-slate-700">Sejarah Pondok Pesantren</label>
                <div class="relative">
                    <textarea 
                        name="sejarah" 
                        id="sejarah" 
                        rows="8" 
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('sejarah') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                        placeholder="Tuliskan sejarah berdirinya pondok pesantren secara detail..."
                        required>{{ old('sejarah', $profil->sejarah) }}</textarea>
                </div>
                @error('sejarah')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Deskripsikan latar belakang, tokoh pendiri, perkembangan pesantren dari tahun ke tahun.</p>
            </div>

            <!-- Visi & Misi Input -->
            <div class="space-y-2">
                <label for="visi_misi" class="block text-sm font-bold text-slate-700">Visi & Misi</label>
                <div class="relative">
                    <textarea 
                        name="visi_misi" 
                        id="visi_misi" 
                        rows="8" 
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('visi_misi') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                        placeholder="Visi:&#10;- ...&#10;&#10;Misi:&#10;- ..."
                        required>{{ old('visi_misi', $profil->visi_misi) }}</textarea>
                </div>
                @error('visi_misi')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Format penulisan dapat disesuaikan dengan menggunakan poin-poin (bullet points).</p>
            </div>

            <!-- Current Photo Preview (if exists) -->
            @if ($profil->path_foto)
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700">Foto Profil Saat Ini</label>
                    <div class="relative w-48 h-48 rounded-lg overflow-hidden border border-slate-200 shadow-sm bg-slate-50 flex items-center justify-center">
                        <img src="{{ asset('storage/' . $profil->path_foto) }}" alt="Foto Profil Pesantren" class="max-w-full max-h-full object-contain">
                    </div>
                </div>
            @endif

            <!-- Foto Upload Input -->
            <div class="space-y-2">
                <label for="foto" class="block text-sm font-bold text-slate-700">Upload Foto Profil</label>
                <div class="relative">
                    <input 
                        type="file" 
                        name="foto" 
                        id="foto" 
                        accept="image/jpeg,image/png,image/jpg"
                        class="w-full text-sm text-slate-650 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-300 rounded-lg p-2 @error('foto') border-red-300 focus:border-red-500 @enderror"
                    >
                </div>
                @error('foto')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400">Pilih gambar berupa format JPEG, PNG, atau JPG (Maks. 2MB). Foto ini akan digunakan di halaman Profil Pesantren.</p>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition duration-150">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-md transition duration-150 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
