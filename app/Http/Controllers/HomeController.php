<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Kegiatan;
use App\Models\Fasilitas;
use App\Models\Kontak;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the public landing page.
     */
    public function index()
    {
        // Get the single profile record
        $profil = Profil::first() ?? new Profil([
            'sejarah' => 'Pondok Pesantren Darussalam berdiri sejak tahun 1995, mendidik generasi rabbani yang berakhlak mulia, berilmu luas, dan berjiwa kepemimpinan.',
            'visi_misi' => "Visi:\nMenjadi pusat pendidikan Islam yang unggul dalam melahirkan kader ulama dan cendekiawan muslim yang bertaqwa, berakhlak karimah, dan berwawasan global.\n\nMisi:\n1. Menyelenggarakan pendidikan kepesantrenan berbasis kitab kuning dan kurikulum modern.\n2. Membina akhlakul karimah dan disiplin hidup islami secara konsisten.\n3. Mengembangkan potensi minat dan bakat santri di bidang bahasa, sains, dan teknologi."
        ]);

        // Get activities and facilities
        $kegiatans = Kegiatan::latest()->take(3)->get();
        $fasilitas = Fasilitas::latest()->take(6)->get();

        // Get contact details
        $kontak = Kontak::first() ?? new Kontak([
            'wa' => '6285232687948',
            'email' => 'ponpesdarussalamm@gmail.com',
            'alamat' => 'Jl. Sendang No 537 Maibit Kulon Ds. Maibit Kec. Rengel Kab. Tuban Jawa Timur Kode Pos. 62371'
        ]);

        return view('home', compact('profil', 'kegiatans', 'fasilitas', 'kontak'));
    }

    /**
     * Display the public profile page.
     */
    public function profil()
    {
        $profil = Profil::first() ?? new Profil([
            'sejarah' => "Pondok Pesantren Darussalam berdiri sejak tahun 1995, mendidik generasi rabbani yang berakhlak mulia, berilmu luas, dan berjiwa kepemimpinan.\n\nDidirikan oleh KH. Ahmad Darussalam di atas tanah wakaf seluas 2 hektar, pesantren ini mengombinasikan sistem pembelajaran salafiyah (kitab kuning) dan sistem kurikulum modern (Kemenag). Hingga saat ini, Darussalam telah meluluskan ribuan alumni yang aktif berkiprah di kancah nasional maupun internasional.",
            'visi_misi' => "Visi:\nMenjadi pusat pendidikan Islam yang unggul dalam melahirkan kader ulama dan cendekiawan muslim yang bertaqwa, berakhlak karimah, dan berwawasan global.\n\nMisi:\n1. Menyelenggarakan pendidikan kepesantrenan berbasis kitab kuning dan kurikulum modern.\n2. Membina akhlakul karimah dan disiplin hidup islami secara konsisten.\n3. Mengembangkan potensi minat dan bakat santri di bidang bahasa, sains, dan teknologi."
        ]);

        $pengurus = Pengurus::orderBy('level_hierarki')->get();

        // Fallback data if table is empty
        if ($pengurus->isEmpty()) {
            $pengurus = collect([
                new Pengurus(['nama' => 'KH. Ahmad Darussalam', 'jabatan' => 'Pengasuh Pondok Pesantren', 'level_hierarki' => 1]),
                new Pengurus(['nama' => 'Ustadz M. Ridwan, M.Pd.', 'jabatan' => 'Ketua Harian', 'level_hierarki' => 2]),
                new Pengurus(['nama' => 'Ustadzah Fatimah, S.Ag.', 'jabatan' => 'Sekretaris & Administrasi', 'level_hierarki' => 2]),
                new Pengurus(['nama' => 'Ustadz Ahmad Fauzi', 'jabatan' => 'Kepala Madrasah Diniyah', 'level_hierarki' => 3]),
                new Pengurus(['nama' => 'Ustadz Hamzah', 'jabatan' => 'Bendahara & Keuangan', 'level_hierarki' => 3]),
                new Pengurus(['nama' => 'Ustadz Yusuf', 'jabatan' => 'Kepala Keamanan & Kesiswaan', 'level_hierarki' => 3]),
            ]);
        }

        $pengurusGrouped = $pengurus->groupBy('level_hierarki')->sortKeys();

        return view('profil', compact('profil', 'pengurusGrouped'));
    }

    /**
     * Display the public kegiatan page.
     */
    public function kegiatan()
    {
        $kegiatans = Kegiatan::latest()->paginate(9);
        return view('kegiatan', compact('kegiatans'));
    }

    /**
     * Display the public fasilitas page.
     */
    public function fasilitas()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('fasilitas', compact('fasilitas'));
    }

    /**
     * Display the public hubungi kami page.
     */
    public function kontak()
    {
        $kontak = Kontak::first() ?? new Kontak([
            'wa' => '6285232687948',
            'email' => 'ponpesdarussalamm@gmail.com',
            'alamat' => 'Jl. Sendang No 537 Maibit Kulon Ds. Maibit Kec. Rengel Kab. Tuban Jawa Timur Kode Pos. 62371'
        ]);

        return view('kontak', compact('kontak'));
    }
}
