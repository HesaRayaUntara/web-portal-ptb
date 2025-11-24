<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['nama', 'slug', 'status', 'bidang_keahlian', 'pendidikan', 'email', 'gsch', 'kepala_program_studi', 'foto'];
    protected $primaryKey = 'id_dosen';
    public $timestamps = true;
    protected $casts = ['kepala_program_studi' => 'boolean'];

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class, 'dosen_id', 'id_dosen');
    }

    public function pengabdian()
    {
        return $this->hasMany(Pengabdian::class, 'dosen_id', 'id_dosen');
    }

    public function publikasi()
    {
        return $this->hasMany(Publikasi::class, 'dosen_id', 'id_dosen');
    }

    public function hki()
    {
        return $this->hasMany(Hki::class, 'dosen_id', 'id_dosen');
    }
}
