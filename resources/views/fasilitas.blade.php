@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
        <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Pondok Pesantren Darussalam</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-850">Galeri Fasilitas</h1>
        <div class="h-1 w-20 bg-emerald-600 mx-auto rounded-full"></div>
    </div>

    <!-- Aesthetic Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($fasilitas as $item)
            <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-200 transition duration-300 h-80 bg-slate-100">
                <!-- Image -->
                @if ($item->path_foto)
                    <img src="{{ asset('storage/' . $item->path_foto) }}" alt="{{ $item->nama_fasilitas }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">No Image</div>
                @endif

                <!-- Dark Gradient Overlay (Transitions on hover) -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-900/20 to-transparent opacity-90 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <!-- Text (Moves up on hover) -->
                    <div class="transform translate-y-2 group-hover:translate-y-0 transition duration-300 ease-out">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-500/80 text-white text-[10px] font-bold uppercase tracking-wider mb-2">
                            Fasilitas
                        </span>
                        <h3 class="text-xl font-bold text-white tracking-wide leading-tight">
                            {{ $item->nama_fasilitas }}
                        </h3>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 text-slate-450">
                <div class="max-w-md mx-auto space-y-3">
                    <svg class="w-12 h-12 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <p class="text-base font-bold text-slate-700">Belum Ada Galeri Fasilitas</p>
                    <p class="text-sm text-slate-500">Saat ini belum ada dokumentasi sarana fasilitas pesantren yang diunggah oleh admin.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
