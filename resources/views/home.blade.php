@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section id="beranda" class="relative min-h-[85vh] flex items-center justify-center bg-slate-900 overflow-hidden">
    <!-- Hero Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/pondok.jpg') }}" alt="Pondok Pesantren Darussalam" class="w-full h-full object-cover object-center opacity-65 scale-105 transition-transform duration-10000">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/50 via-slate-950/50 to-slate-950/90"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative max-w-5xl mx-auto px-6 pt-32 pb-24 text-center z-10 space-y-8">
        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-bold uppercase tracking-widest border border-emerald-500/20 backdrop-blur-sm shadow-inner">
            Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }} Telah Dibuka
        </span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-amber-400 tracking-tight leading-tight uppercase font-heading" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.85);">
            Pondok Pesantren <br class="hidden sm:inline"> Darussalam
        </h1>
        <p class="max-w-3xl mx-auto text-lg md:text-xl text-slate-100 leading-relaxed font-normal" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.855);">
            Pondok pesantren Darussalam berkomitmen mencetak generasi yang mampu menyeimbangkan fikir dan dzikir, siap menghadapi tantangan globalisasi & era digital.
        </p>
        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScjewXuYkYZtxY1-jdnkyDNzqBPIFgG2K09HI0RXwatWwEjbQ/viewform?usp=header" target="_blank" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600 text-slate-950 rounded-xl font-extrabold shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:-translate-y-0.5 transition duration-150 text-center">
                Daftar Sekarang
            </a>
            <a href="{{ route('public.profil') }}" class="w-full sm:w-auto px-8 py-4 bg-slate-800/80 hover:bg-slate-850 text-white border border-slate-700 rounded-xl font-bold backdrop-blur transition duration-150 text-center">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>

<!-- Kegiatan Section -->
<section id="kegiatan" class="py-24 bg-slate-50 border-t border-b border-slate-100 scroll-mt-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Dokumentasi</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-850">Kegiatan Terbaru</h2>
            <div class="h-1 w-16 bg-emerald-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($kegiatans as $kegiatan)
                <article class="bg-white rounded-2xl overflow-hidden border border-slate-150 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col h-full">
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
                    <div x-data="{ expanded: false }" class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold text-slate-800 leading-snug">{{ $kegiatan->judul }}</h3>
                            @if (strlen($kegiatan->deskripsi) > 120)
                                <div class="text-sm text-slate-500 leading-relaxed text-justify">
                                    <p x-show="!expanded">{{ Str::limit($kegiatan->deskripsi, 120) }}</p>
                                    <p x-show="expanded" style="display: none;" class="whitespace-pre-line">{{ $kegiatan->deskripsi }}</p>
                                    <button @click="expanded = !expanded" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 transition mt-2 focus:outline-none">
                                        <span x-text="expanded ? 'Tampilkan lebih sedikit' : 'Baca selengkapnya...'"></span>
                                    </button>
                                </div>
                            @else
                                <p class="text-sm text-slate-500 leading-relaxed text-justify">{{ $kegiatan->deskripsi }}</p>
                            @endif
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                            <span>Oleh Admin</span>
                            <span>{{ $kegiatan->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12 text-slate-400">
                    Belum ada dokumentasi kegiatan yang diterbitkan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Fasilitas Section -->
<section id="fasilitas" class="py-24 bg-white scroll-mt-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Pondok Pesantren</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-850">Fasilitas Pesantren</h2>
            <div class="h-1 w-16 bg-emerald-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($fasilitas as $item)
                <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-md border border-slate-150 transition duration-200 h-64 bg-slate-150">
                    @if ($item->path_foto)
                        <img src="{{ asset('storage/' . $item->path_foto) }}" alt="{{ $item->nama_fasilitas }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">No Image</div>
                    @endif
                    <!-- Bottom Overlay Banner -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent flex items-end p-6">
                        <div>
                            <h3 class="text-lg font-bold text-white tracking-wide">{{ $item->nama_fasilitas }}</h3>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-400">
                    Belum ada dokumentasi fasilitas yang diunggah.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Hubungi Kami Section -->
<section id="hubungi-kami" class="py-24 bg-slate-950 text-white scroll-mt-10 relative overflow-hidden">
    <!-- Subtle Background Graphics -->
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
            <defs>
                <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                    <path d="M 20 0 L 0 0 0 20" fill="none" stroke="currentColor" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <div class="relative max-w-5xl mx-auto px-6 z-10">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 items-center">
            <!-- Left Info -->
            <div class="lg:col-span-3 space-y-6">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Informasi Kontak</span>
                <h2 class="text-3xl md:text-4xl font-extrabold">Hubungi Sekretariat Kami</h2>
                <p class="text-slate-400 text-base leading-relaxed">
                    Kami dengan senang hati menyambut kehadiran para santri baru dan silaturahmi wali santri. Jika Anda memiliki pertanyaan seputar pendaftaran santri, kurikulum, sarana, atau ingin berkunjung, jangan ragu untuk menghubungi kami.
                </p>
                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="https://wa.me/{{ $kontak->wa ?? '6281234567890' }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-lg transition duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="mailto:{{ $kontak->email ?? 'info@darussalam.com' }}" class="inline-flex items-center px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-lg border border-slate-700 transition duration-150">
                        Email Kami
                    </a>
                </div>
            </div>

            <!-- Right Info Card -->
            <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-2xl p-8 space-y-6">
                <h3 class="text-xl font-bold">Sekretariat Pendaftaran</h3>
                <div class="space-y-4 text-sm text-slate-350">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>{{ $kontak->alamat ?? 'Jl. Pesantren No. 1, Darussalam' }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+{{ $kontak->wa ?? '6281234567890' }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $kontak->email ?? 'info@darussalam.com' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
