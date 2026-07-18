@extends('layouts.admin')

@section('header_title', 'Dashboard Admin')

@section('content')
<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-emerald-800 to-teal-700 text-white rounded-2xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold">Selamat Datang di Panel Admin, {{ Auth::user()->name }}!</h3>
        <p class="text-emerald-100 mt-2 max-w-xl">Kelola profil, kegiatan, fasilitas, dan kontak Pondok Pesantren Darussalam dengan mudah dari satu dashboard terintegrasi.</p>
    </div>

    <!-- Quick Stats & Actions Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Profil Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">Kelola Profil</h4>
                <p class="text-slate-500 text-sm mt-1 mb-4">Perbarui informasi sejarah berdirinya pondok pesantren serta rumusan visi dan misinya.</p>
            </div>
            <a href="{{ route('admin.profil.edit') }}" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                Kelola Profil
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Kepengurusan Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">Kelola Kepengurusan</h4>
                <p class="text-slate-500 text-sm mt-1 mb-4">Atur daftar nama pengurus pesantren beserta jabatan dan urutan tingkat hierarkinya.</p>
            </div>
            <a href="#" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                Kelola Kepengurusan
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Kegiatan Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">Kelola Kegiatan</h4>
                <p class="text-slate-500 text-sm mt-1 mb-4">Unggah kegiatan, berita terbaru, foto kegiatan santri, dan deskripsi acara pesantren.</p>
            </div>
            <a href="#" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                Kelola Kegiatan
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Fasilitas Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">Kelola Fasilitas</h4>
                <p class="text-slate-500 text-sm mt-1 mb-4">Kelola daftar fasilitas fisik yang dimiliki seperti gedung, masjid, perpustakaan, asrama, dll.</p>
            </div>
            <a href="#" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                Kelola Fasilitas
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Kontak Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">Kelola Kontak</h4>
                <p class="text-slate-500 text-sm mt-1 mb-4">Sesuaikan info kontak yang bisa dihubungi seperti nomor WhatsApp, Email, dan Alamat fisik.</p>
            </div>
            <a href="#" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold text-sm">
                Kelola Kontak
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
