<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pondok Pesantren Darussalam</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-700 bg-slate-50 selection:bg-emerald-600 selection:text-white" 
          x-data="{ mobileMenuOpen: false, scrolled: false }" 
          @scroll.window="scrolled = (window.pageYOffset > 50)">
        
        <!-- Header / Navbar -->
        <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b"
                :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'bg-white/95 backdrop-blur-md border-slate-100 shadow-sm' : 'bg-transparent border-transparent shadow-none'">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between transition-all duration-300"
                 :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'h-16' : 'h-24'">
                <!-- Logo / Brand -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Darussalam" class="w-12 h-12 object-contain rounded-xl bg-white p-0.5 shadow-md shadow-emerald-700/20">
                    <div class="flex flex-col justify-center">
                        <span class="block text-[10px] md:text-xs font-bold uppercase tracking-wider leading-none transition-colors duration-300"
                              :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-emerald-600' : 'text-amber-300'">Pondok Pesantren</span>
                        <span class="block text-xl font-extrabold tracking-tight leading-tight transition-colors duration-300 mt-1"
                              :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-850' : 'text-white'">Darussalam</span>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-8 font-medium">
                    <a href="{{ route('home') }}" class="transition duration-150 text-sm font-semibold" :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:text-emerald-700' : 'text-white/90 hover:text-amber-400'">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="transition duration-150 text-sm font-semibold" :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:text-emerald-700' : 'text-white/90 hover:text-amber-400'">Profil</a>
                    <a href="{{ route('public.kegiatan') }}" class="transition duration-150 text-sm font-semibold" :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:text-emerald-700' : 'text-white/90 hover:text-amber-400'">Kegiatan</a>
                    <a href="{{ route('public.fasilitas') }}" class="transition duration-150 text-sm font-semibold" :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:text-emerald-700' : 'text-white/90 hover:text-amber-400'">Fasilitas</a>
                    <a href="{{ route('public.kontak') }}" class="transition duration-150 text-sm font-semibold" :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:text-emerald-700' : 'text-white/90 hover:text-amber-400'">Hubungi Kami</a>
                </nav>

                <!-- Desktop CTA Button -->
                <div class="hidden md:block">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScjewXuYkYZtxY1-jdnkyDNzqBPIFgG2K09HI0RXwatWwEjbQ/viewform?usp=header" target="_blank" class="px-5 py-2.5 rounded-lg text-sm font-extrabold shadow-md transition-all duration-300 bg-amber-500 hover:bg-amber-600 text-slate-950 shadow-amber-500/20 hover:shadow-amber-500/40 hover:-translate-y-0.5 transform">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg transition"
                        :class="(scrolled || mobileMenuOpen || !{{ Route::is('home') ? 'true' : 'false' }}) ? 'text-slate-600 hover:bg-slate-50' : 'text-white hover:bg-white/10'">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Drawer -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="md:hidden bg-white border-b border-slate-100 px-6 py-4 space-y-3 shadow-inner"
                 style="display: none;">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}" class="block py-2 text-slate-600 hover:text-emerald-700 font-medium">Beranda</a>
                <a @click="mobileMenuOpen = false" href="{{ route('public.profil') }}" class="block py-2 text-slate-600 hover:text-emerald-700 font-medium">Profil</a>
                <a @click="mobileMenuOpen = false" href="{{ route('public.kegiatan') }}" class="block py-2 text-slate-600 hover:text-emerald-700 font-medium">Kegiatan</a>
                <a @click="mobileMenuOpen = false" href="{{ route('public.fasilitas') }}" class="block py-2 text-slate-600 hover:text-emerald-700 font-medium">Fasilitas</a>
                <a @click="mobileMenuOpen = false" href="{{ route('public.kontak') }}" class="block py-2 text-slate-600 hover:text-emerald-700 font-medium">Hubungi Kami</a>
                <div class="pt-2">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScjewXuYkYZtxY1-jdnkyDNzqBPIFgG2K09HI0RXwatWwEjbQ/viewform?usp=header" target="_blank" class="block w-full text-center py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 rounded-lg font-extrabold shadow-md shadow-amber-500/20">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Frontend Content -->
        <main class="{{ Route::is('home') ? '' : 'pt-20' }}">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-emerald-950 text-emerald-100 border-t border-emerald-900 pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Column 1: Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Darussalam" class="w-12 h-12 object-contain rounded-xl bg-white p-0.5 shadow-md">
                        <div class="flex flex-col justify-center">
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-emerald-300 leading-none">Pondok Pesantren</span>
                            <span class="block text-xl font-extrabold text-white tracking-tight leading-tight mt-0.5">Darussalam</span>
                        </div>
                    </div>
                    <p class="text-emerald-300 text-sm leading-relaxed">Mewujudkan generasi Muslim yang berakhlak mulia, cerdas, tafaqquh fiddin, dan mandiri untuk kemaslahatan umat.</p>
                </div>

                <!-- Column 2: Nav Links -->
                <div class="space-y-4">
                    <h4 class="text-white font-bold tracking-wider text-sm uppercase">Tautan Cepat</h4>
                    <ul class="space-y-2.5 text-sm text-emerald-300">
                        <li><a href="#beranda" class="hover:text-amber-400 transition">Beranda</a></li>
                        <li><a href="#profil" class="hover:text-amber-400 transition">Profil Pesantren</a></li>
                        <li><a href="#kegiatan" class="hover:text-amber-400 transition">Dokumentasi Kegiatan</a></li>
                        <li><a href="#fasilitas" class="hover:text-amber-400 transition">Fasilitas Pondok Pesantren</a></li>
                    </ul>
                </div>

                <!-- Column 3: Jam Operasional / Layanan -->
                <div class="space-y-4">
                    <h4 class="text-white font-bold tracking-wider text-sm uppercase">Layanan Pendaftaran</h4>
                    <p class="text-emerald-300 text-sm leading-relaxed">
                        Pendaftaran santri baru dibuka setiap tahun ajaran baru secara daring (online) maupun luring (offline) di sekretariat pendaftaran.
                    </p>
                </div>

                <!-- Column 4: Kontak -->
                <div class="space-y-4" id="footer-kontak">
                    <h4 class="text-white font-bold tracking-wider text-sm uppercase">Hubungi Kami</h4>
                    <ul class="space-y-3 text-sm text-emerald-300">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span id="footer-alamat">Jl. Sendang No 537 Maibit Kulon Ds. Maibit Kec. Rengel Kab. Tuban Jawa Timur Kode Pos. 62371</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a id="footer-wa" href="https://wa.me/6285232687948" target="_blank" class="hover:text-amber-400 transition">+62 852-3268-7948</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a id="footer-email" href="mailto:ponpesdarussalamm@gmail.com" class="hover:text-amber-400 transition">ponpesdarussalamm@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer copyright -->
            <div class="max-w-7xl mx-auto px-6 border-t border-emerald-900 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-emerald-400">
                <p>&copy; {{ date('Y') }} Pondok Pesantren Darussalam. Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    </body>
</html>
