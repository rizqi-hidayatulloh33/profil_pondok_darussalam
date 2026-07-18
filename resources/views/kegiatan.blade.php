@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
        <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Dokumentasi Pesantren</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-850">Kegiatan & Berita</h1>
        <div class="h-1 w-20 bg-emerald-600 mx-auto rounded-full"></div>
    </div>

    <!-- Grid Layout (3 columns) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($kegiatans as $kegiatan)
            <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col h-full">
                <!-- Foto Kegiatan -->
                <div class="h-56 overflow-hidden bg-slate-100 relative">
                    @if ($kegiatan->path_foto)
                        <img src="{{ asset('storage/' . $kegiatan->path_foto) }}" alt="{{ $kegiatan->judul }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400 font-medium">No Image</div>
                    @endif
                    <span class="absolute top-4 left-4 bg-emerald-700 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                        Kegiatan
                    </span>
                </div>

                <!-- Konten Kegiatan -->
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-slate-800 leading-snug">{{ $kegiatan->judul }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed text-justify">{{ $kegiatan->deskripsi }}</p>
                    </div>
                    
                    <!-- Footer Card -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span>Oleh Administrator</span>
                        <span>{{ $kegiatan->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full text-center py-20 text-slate-450">
                <div class="max-w-md mx-auto space-y-3">
                    <svg class="w-12 h-12 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0011.5 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2z"/>
                    </svg>
                    <p class="text-base font-bold text-slate-700">Belum Ada Dokumentasi Kegiatan</p>
                    <p class="text-sm text-slate-500">Saat ini belum ada data kegiatan yang diunggah oleh admin pondok pesantren.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination Links -->
    @if ($kegiatans->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $kegiatans->links() }}
        </div>
    @endif
</div>
@endsection
