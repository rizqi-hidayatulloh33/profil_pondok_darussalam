<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('public.profil');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('public.kegiatan');
Route::get('/fasilitas', [HomeController::class, 'fasilitas'])->name('public.fasilitas');
Route::get('/hubungi-kami', [HomeController::class, 'kontak'])->name('public.kontak');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::redirect('/admin', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Profil (Sejarah, Visi, Misi)
    Route::get('/admin/profil', [App\Http\Controllers\ProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('/admin/profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('admin.profil.update');

    // Admin Kegiatan
    Route::resource('/admin/kegiatan', App\Http\Controllers\KegiatanController::class, [
        'as' => 'admin'
    ]);

    // Admin Fasilitas
    Route::resource('/admin/fasilitas', App\Http\Controllers\FasilitasController::class, [
        'as' => 'admin'
    ]);

    // Admin Kepengurusan
    Route::resource('/admin/pengurus', App\Http\Controllers\PengurusController::class, [
        'as' => 'admin'
    ]);
});

require __DIR__.'/auth.php';
