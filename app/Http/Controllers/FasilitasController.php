<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:200',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fasilitas', 'public');
        }

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $fasilitas->path_foto;
        if ($request->hasFile('foto')) {
            // Delete old file
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('foto')->store('fasilitas', 'public');
        }

        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->path_foto) {
            Storage::disk('public')->delete($fasilitas->path_foto);
        }
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
