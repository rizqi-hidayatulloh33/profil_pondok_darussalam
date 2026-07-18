<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = Pengurus::orderBy('level_hierarki')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pengurus.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'level_hierarki' => 'required|integer|min:1|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pengurus', 'public');
        }

        Pengurus::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'level_hierarki' => $request->level_hierarki,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengurus $penguru)
    {
        return view('admin.pengurus.edit', ['pengurus' => $penguru]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengurus $penguru)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'level_hierarki' => 'required|integer|min:1|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $penguru->path_foto;
        if ($request->hasFile('foto')) {
            // Delete old file if exists
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('foto')->store('pengurus', 'public');
        }

        $penguru->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'level_hierarki' => $request->level_hierarki,
            'path_foto' => $path,
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengurus $penguru)
    {
        if ($penguru->path_foto && Storage::disk('public')->exists($penguru->path_foto)) {
            Storage::disk('public')->delete($penguru->path_foto);
        }
        
        $penguru->delete();

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil dihapus.');
    }
}
