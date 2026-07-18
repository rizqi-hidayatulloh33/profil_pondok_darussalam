@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16" x-data="{ activeTab: 'sejarah' }">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
        <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Tentang Darussalam</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-850">Profil Pondok Pesantren</h1>
        <div class="h-1 w-20 bg-emerald-600 mx-auto rounded-full"></div>
    </div>

    <!-- Sidebar Layout Container -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
        <!-- Sidebar Navigation (Left) -->
        <aside class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-2 lg:sticky lg:top-24">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 mb-4">Navigasi Profil</h3>
            
            <!-- Sejarah Tab Button -->
            <button @click="activeTab = 'sejarah'" 
                    :class="activeTab === 'sejarah' ? 'bg-emerald-50 text-emerald-700 font-bold border-l-4 border-emerald-600' : 'text-slate-650 hover:bg-slate-50 hover:text-slate-800 border-l-4 border-transparent'"
                    class="w-full text-left px-4 py-3 rounded-r-lg transition duration-150 flex items-center text-sm">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" :class="activeTab === 'sejarah' ? 'text-emerald-600' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Sejarah Singkat
            </button>

            <!-- Visi Misi Tab Button -->
            <button @click="activeTab = 'visi_misi'" 
                    :class="activeTab === 'visi_misi' ? 'bg-emerald-50 text-emerald-700 font-bold border-l-4 border-emerald-600' : 'text-slate-650 hover:bg-slate-50 hover:text-slate-800 border-l-4 border-transparent'"
                    class="w-full text-left px-4 py-3 rounded-r-lg transition duration-150 flex items-center text-sm">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" :class="activeTab === 'visi_misi' ? 'text-emerald-600' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Visi & Misi
            </button>

            <!-- Kepengurusan Tab Button -->
            <button @click="activeTab = 'kepengurusan'" 
                    :class="activeTab === 'kepengurusan' ? 'bg-emerald-50 text-emerald-700 font-bold border-l-4 border-emerald-600' : 'text-slate-650 hover:bg-slate-50 hover:text-slate-800 border-l-4 border-transparent'"
                    class="w-full text-left px-4 py-3 rounded-r-lg transition duration-150 flex items-center text-sm">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" :class="activeTab === 'kepengurusan' ? 'text-emerald-600' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Struktur Kepengurusan
            </button>
        </aside>

        <!-- Content Area (Right) -->
        <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200 p-8 md:p-12 shadow-sm min-h-[50vh]">
            
            <!-- Tab: Sejarah -->
            <div x-show="activeTab === 'sejarah'" x-transition.opacity>
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </span>
                    Sejarah Singkat Pesantren
                </h2>
                <div class="text-slate-650 leading-relaxed space-y-6 text-justify text-base whitespace-pre-line border-t border-slate-100 pt-6">
                    @if ($profil->path_foto)
                        <div class="w-full md:w-80 float-none md:float-left md:mr-8 mb-6 md:mb-4 rounded-2xl overflow-hidden shadow-lg border border-slate-200 bg-white p-1">
                            <img src="{{ asset('storage/' . $profil->path_foto) }}" alt="Foto Sejarah/Profil Pesantren" class="w-full h-auto object-cover rounded-xl">
                        </div>
                    @endif
                    {{ $profil->sejarah }}
                </div>
            </div>

            <!-- Tab: Visi Misi -->
            <div x-show="activeTab === 'visi_misi'" x-transition.opacity style="display: none;">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </span>
                    Visi & Misi Pesantren
                </h2>
                <div class="text-slate-650 leading-relaxed text-base whitespace-pre-line border-t border-slate-100 pt-6">
                    {{ $profil->visi_misi }}
                </div>
            </div>

            <!-- Tab: Kepengurusan (Organizational Chart) -->
            <div x-show="activeTab === 'kepengurusan'" x-transition.opacity style="display: none;">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </span>
                    Struktur Kepengurusan Pesantren
                </h2>
                <p class="text-sm text-slate-500 mb-10 border-t border-slate-100 pt-4">Berikut adalah bagan struktur kepengurusan Pondok Pesantren Darussalam dari pimpinan tertinggi hingga divisi staf pendukung.</p>

                <!-- Tree Organizational Chart Container -->
                <div class="overflow-x-auto pb-8 pt-4">
                    <div class="min-w-[600px] flex flex-col items-center space-y-8">
                        @foreach ($pengurusGrouped as $level => $members)
                            
                            <!-- Connecting Line between Levels -->
                            @if (!$loop->first)
                                <div class="flex flex-col items-center -my-2">
                                    <!-- Vertical line from above level -->
                                    <div class="w-0.5 h-6 bg-emerald-500"></div>
                                    
                                    <!-- Horizontal bridge line if there are multiple children -->
                                    @if ($members->count() > 1)
                                        <div class="h-0.5 bg-emerald-500" style="width: calc(100% - 200px);"></div>
                                    @endif
                                </div>
                            @endif

                            <!-- Level Container Row -->
                            <div class="flex justify-center items-stretch gap-8 relative w-full">
                                @foreach ($members as $pengurus)
                                    <!-- Member Node Wrapper -->
                                    <div class="flex flex-col items-center relative">
                                        <!-- Vertical line entry to card (except for level 1) -->
                                        @if ($level > 1)
                                            <div class="w-0.5 h-4 bg-emerald-500 -mt-4 mb-2"></div>
                                        @endif

                                        <!-- Node Card -->
                                        <div class="bg-gradient-to-b from-white to-slate-50 border-2 {{ $level === 1 ? 'border-emerald-600 bg-emerald-50/10' : 'border-emerald-500' }} rounded-xl p-4 text-center shadow-sm hover:shadow-md hover:scale-102 transition duration-200 w-52 flex flex-col justify-center min-h-[110px] z-10">
                                            @if ($pengurus->path_foto)
                                                <img src="{{ asset('storage/' . $pengurus->path_foto) }}" alt="Foto {{ $pengurus->nama }}" class="w-12 h-12 rounded-full object-cover mx-auto mb-2 border-2 border-emerald-500/20 shadow-sm">
                                            @else
                                                <div class="w-12 h-12 rounded-full {{ $level === 1 ? 'bg-emerald-600' : 'bg-emerald-500' }} text-white flex items-center justify-center font-bold text-sm mx-auto mb-2 uppercase shadow-sm">
                                                    {{ substr($pengurus->nama, 0, 1) }}
                                                </div>
                                            @endif
                                            <h4 class="font-bold text-slate-800 text-sm leading-tight">{{ $pengurus->nama }}</h4>
                                            <p class="text-xs text-emerald-700 font-semibold mt-1">{{ $pengurus->jabatan }}</p>
                                            @if ($pengurus->periode)
                                                <p class="text-[10px] text-slate-400 font-medium mt-1">Periode: {{ $pengurus->periode }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
