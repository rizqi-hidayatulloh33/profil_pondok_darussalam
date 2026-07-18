@extends('layouts.admin')

@section('header_title', 'Kelola Kegiatan Pesantren')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-800">Daftar Kegiatan</h3>
            <p class="text-sm text-slate-500 mt-1">Daftar semua dokumentasi kegiatan santri dan berita terbaru.</p>
        </div>
        <a href="{{ route('admin.kegiatan.create') }}" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-md transition duration-150 flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Kegiatan Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs font-bold uppercase tracking-wider">
                        <th class="px-6 py-4 w-20">Foto</th>
                        <th class="px-6 py-4">Judul Kegiatan</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($kegiatans as $kegiatan)
                        <tr class="hover:bg-slate-50/50 transition duration-150">
                            <td class="px-6 py-4">
                                @if ($kegiatan->path_foto)
                                    <img src="{{ asset('storage/' . $kegiatan->path_foto) }}" alt="{{ $kegiatan->judul }}" class="w-12 h-12 object-cover rounded-lg shadow-sm border border-slate-100">
                                @else
                                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400 text-xs font-medium">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800">
                                {{ $kegiatan->judul }}
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate">
                                {{ Str::limit($kegiatan->deskripsi, 80) }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2.5">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-md text-xs font-semibold border border-amber-200 transition duration-150">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 rounded-md text-xs font-semibold border border-red-200 transition duration-150">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0V9a2 2 0 00-2-2H6a2 2 0 00-2 2v2m16 4h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <span>Belum ada data kegiatan. Silakan tambah data baru.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if ($kegiatans->hasPages())
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">
                {{ $kegiatans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
