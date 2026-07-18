<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';

    protected $fillable = [
        'sejarah',
        'visi_misi',
        'path_foto',
    ];
}
