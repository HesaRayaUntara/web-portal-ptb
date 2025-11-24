<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLulusan extends Model
{
    use HasFactory;

    protected $table = 'profil_lulusan';
    protected $fillable = ['profil_prodi_id', 'peran', 'deskripsi_kemampuan'];
    protected $primaryKey = 'id_profil_lulusan';
    public $timestamps = true;

    public function profilProdi()
    {
        return $this->belongsTo(ProfilProdi::class, 'profil_prodi_id', 'id_profil_prodi');
    }
}

