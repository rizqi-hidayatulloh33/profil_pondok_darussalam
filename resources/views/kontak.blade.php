@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
        <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Hubungi Sekretariat</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-850">Hubungi Kami</h1>
        <div class="h-1 w-20 bg-emerald-600 mx-auto rounded-full"></div>
    </div>

    <!-- Cards Grid (3 columns) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch max-w-5xl mx-auto">
        
        <!-- WhatsApp Card -->
        <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between text-center group">
            <div class="space-y-6">
                <!-- Icon -->
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-sm group-hover:scale-105 transition duration-200">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.003 5.156 5.3 0 11.8 0c3.148.002 6.11 1.232 8.341 3.465 2.23 2.233 3.457 5.197 3.455 8.351-.004 6.648-5.3 11.804-11.8 11.804-2.007-.002-3.98-.51-5.734-1.479L0 24zm6.49-4.754l.412.245c1.472.873 3.102 1.333 4.775 1.335 5.228 0 9.48-4.148 9.482-9.243.002-2.469-.962-4.79-2.716-6.549C16.705 3.328 14.39 2.362 11.8 2.36c-5.23 0-9.482 4.149-9.484 9.246-.002 1.777.473 3.513 1.378 5.047l.275.465-1.012 3.693 3.868-.988c1.458.775 3.088 1.183 4.717 1.187zm10.985-7.585c-.328-.16-.1.228-.636-.549a15.42 15.42 0 00-2.316-2.28c-.287-.228-.485-.297-.684-.047-.198.249-.768.966-.941 1.164-.173.199-.347.224-.675.063-2.122-1.03-3.486-2.053-4.793-4.298-.344-.593-.687-1.186-.342-1.343.328-.15.474-.325.626-.546.15-.224.075-.423-.038-.621-.112-.2-.992-2.39-1.36-3.275-.357-.862-.72-.746-.992-.759-.253-.012-.544-.015-.835-.015a1.603 1.603 0 00-1.163.535C4.248 3.86 3.125 4.954 3.125 7.194c0 2.239 1.666 4.393 1.897 4.704.232.311 3.23 4.814 7.91 6.812 3.86 1.646 4.646 1.319 5.485 1.242.84-.077 2.709-1.092 3.09-2.15.381-1.056.381-1.958.267-2.149-.115-.19-.425-.35-.753-.51z" />
                    </svg>
                </div>
                <!-- Details -->
                <div class="space-y-2">
                    <h3 class="text-xl font-bold text-slate-800">WhatsApp</h3>
                    <p class="text-sm text-slate-500">Hubungi langsung via pesan singkat WhatsApp untuk pertanyaan respon cepat.</p>
                </div>
                <p class="text-lg font-bold text-emerald-600 leading-none pt-2">+{{ $kontak->wa ?? '6281234567890' }}</p>
            </div>
            
            <!-- Button Link -->
            <div class="pt-8">
                <a href="https://wa.me/{{ $kontak->wa ?? '6281234567890' }}" target="_blank" class="block w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md shadow-emerald-600/10 hover:shadow-emerald-600/20 transition duration-150">
                    Kirim Pesan WA
                </a>
            </div>
        </div>

        <!-- Email Card -->
        <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between text-center group">
            <div class="space-y-6">
                <!-- Icon -->
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto shadow-sm group-hover:scale-105 transition duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <!-- Details -->
                <div class="space-y-2">
                    <h3 class="text-xl font-bold text-slate-800">Email Resmi</h3>
                    <p class="text-sm text-slate-500">Kirim surat resmi, penawaran kerjasama, atau dokumen lainnya melalui email.</p>
                </div>
                <p class="text-lg font-bold text-blue-600 leading-normal pt-2 break-all px-2">{{ $kontak->email ?? 'info@darussalam.com' }}</p>
            </div>
            
            <!-- Button Link -->
            <div class="pt-8">
                <a href="mailto:{{ $kontak->email ?? 'info@darussalam.com' }}" class="block w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md shadow-blue-650/10 hover:shadow-blue-650/20 transition duration-150">
                    Kirim Surat Email
                </a>
            </div>
        </div>

        <!-- Alamat Card -->
        <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between text-center group">
            <div class="space-y-6">
                <!-- Icon -->
                <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto shadow-sm group-hover:scale-105 transition duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <!-- Details -->
                <div class="space-y-2">
                    <h3 class="text-xl font-bold text-slate-800">Alamat Fisik</h3>
                    <p class="text-sm text-slate-500">Kunjungi langsung sekretariat pendaftaran Pondok Pesantren kami untuk silaturahmi.</p>
                </div>
                <p class="text-sm font-bold text-slate-700 leading-tight pt-2">{{ $kontak->alamat ?? 'Jl. Sendang No 537 Maibit Kulon Ds. Maibit Kec. Rengel Kab. Tuban Jawa Timur Kode Pos. 62371' }}</p>
            </div>
            
            <!-- Button Link -->
            <div class="pt-8">
                <a href="https://www.google.com/maps/search/?api=1&query=-7.070033,111.979647" target="_blank" class="block w-full py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl shadow-md shadow-amber-600/10 hover:shadow-amber-600/20 transition duration-150">
                    Petunjuk Arah Maps
                </a>
            </div>
        </div>

    </div>

    <!-- Google Maps Embed Section -->
    <div class="max-w-5xl mx-auto mt-16">
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm overflow-hidden space-y-4">
            <div class="flex items-center space-x-3 mb-2">
                <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </span>
                <h3 class="text-xl font-bold text-slate-800">Lokasi Pesantren (Google Maps)</h3>
            </div>
            <div class="relative w-full h-[450px] rounded-xl overflow-hidden shadow-inner border border-slate-100">
                <iframe 
                    class="absolute inset-0 w-full h-full border-0"
                    src="https://maps.google.com/maps?q=-7.070033,111.979647&z=16&output=embed" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
