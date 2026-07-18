<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('kegiatan', 'public');
        }

        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $kegiatan->path_foto;
        if ($request->hasFile('foto')) {
            // Delete old file
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('foto')->store('kegiatan', 'public');
        }

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->path_foto) {
            Storage::disk('public')->delete($kegiatan->path_foto);
        }
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
