@extends('layouts.admin')

@section('header_title', 'Edit Kegiatan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Form Header -->
        <div class="p-6 bg-slate-50 border-b border-slate-200">
            <h3 class="text-lg font-bold text-slate-800">Edit Kegiatan</h3>
            <p class="text-sm text-slate-500 mt-1">Perbarui dokumentasi kegiatan pesantren.</p>
        </div>

        <!-- Form Content -->
        <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="space-y-2">
                <label for="judul" class="block text-sm font-bold text-slate-700">Judul Kegiatan</label>
                <input 
                    type="text" 
                    name="judul" 
                    id="judul" 
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 text-slate-700 placeholder-slate-400 @error('judul') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    placeholder="Contoh: Peringatan Hari Santri Nasional"
                    value="{{ old('judul', $kegiatan->judul) }}"
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
                    required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Foto -->
            <div class="space-y-4">
                <label class="block text-sm font-bold text-slate-700">Foto Kegiatan</label>
                
                @if ($kegiatan->path_foto)
                    <div class="flex items-start space-x-4 p-4 bg-slate-50 border border-slate-200 rounded-lg">
                        <img src="{{ asset('storage/' . $kegiatan->path_foto) }}" alt="{{ $kegiatan->judul }}" class="w-32 h-32 object-cover rounded-lg shadow-sm border border-slate-200">
                        <div>
                            <span class="text-xs font-semibold uppercase bg-slate-200 text-slate-600 px-2.5 py-1 rounded-full">Foto Saat Ini</span>
                            <p class="text-xs text-slate-500 mt-2">Biarkan kosong jika Anda tidak ingin mengganti foto saat ini.</p>
                        </div>
                    </div>
                @endif

                <input 
                    type="file" 
                    name="foto" 
                    id="foto" 
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-300 rounded-lg p-1.5 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 @error('foto') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    accept="image/*">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
