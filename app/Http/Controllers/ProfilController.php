<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Show the form for editing the pesantren profile.
     */
    public function edit()
    {
        // Get the first record or create a default one
        $profil = Profil::firstOrCreate(
            ['id' => 1],
            [
                'sejarah' => 'Sejarah Pondok Pesantren Darussalam...',
                'visi_misi' => "Visi:\n...\n\nMisi:\n...",
            ]
        );

        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update the pesantren profile in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi_misi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profil = Profil::firstOrCreate(['id' => 1]);
        
        $data = [
            'sejarah' => $request->sejarah,
            'visi_misi' => $request->visi_misi,
        ];

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($profil->path_foto && \Storage::disk('public')->exists($profil->path_foto)) {
                \Storage::disk('public')->delete($profil->path_foto);
            }
            // Store new photo
            $path = $request->file('foto')->store('profil', 'public');
            $data['path_foto'] = $path;
        }

        $profil->update($data);

        return redirect()->route('admin.profil.edit')->with('success', 'Profil pesantren berhasil diperbarui.');
    }
}
