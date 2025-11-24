<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilProdi extends Model
{
    use HasFactory;

    protected $table = 'profil_prodi';
    protected $fillable = ['deskripsi', 'visi', 'misi', 'tujuan', 'lama_studi', 'gelar_lulusan', 'kepanjangan_gelar', 'snbp_pelamar', 'snbp_diterima', 'snbp_keketatan', 'snbt_pelamar', 'snbt_diterima', 'snbt_keketatan', 'akreditasi', 'no_sk', 'foto_akreditasi', 'industri_tempat_bekerja', 'mitra_logo'];
    protected $primaryKey = 'id_profil_prodi';
    public $timestamps = true;
    protected $casts = ['mitra_logo' => 'array', 'snbp_keketatan' => 'decimal:2', 'snbt_keketatan' => 'decimal:2'];

    public function profilLulusan()
    {
        return $this->hasMany(ProfilLulusan::class, 'profil_prodi_id', 'id_profil_prodi');
    }
}
