<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilProdi extends Model
{
    use HasFactory;

    protected $table = 'profil_prodi';

    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
        'lama_studi',
        'gelar_lulusan',
        'kepanjangan_gelar',
        'snbp_pelamar',
        'snbp_diterima',
        'snbp_keketatan',
        'snbt_pelamar',
        'snbt_diterima',
        'snbt_keketatan',
        'akreditasi',
        'no_sk',
        'foto_akreditasi',
        'industri_tempat_bekerja',
        'posisi_banyak_dicari',
        'nilai_etika',
        'pendekatan_pembelajaran',
        'kompetensi_lulusan',
        'mitra_logo',
    ];

    protected $casts = [
        'mitra_logo' => 'array',
        'snbp_keketatan' => 'decimal:2',
        'snbt_keketatan' => 'decimal:2',
    ];
}
