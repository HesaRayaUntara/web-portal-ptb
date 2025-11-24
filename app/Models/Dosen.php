<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'nama',
        'slug',
        'status',
        'bidang_keahlian',
        'pendidikan',
        'email',
        'gsch',
        'kepala_program_studi',
        'foto',
    ];

    protected $casts = [
        'kepala_program_studi' => 'boolean',
    ];

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class);
    }

    public function pengabdian()
    {
        return $this->hasMany(Pengabdian::class);
    }

    public function publikasi()
    {
        return $this->hasMany(Publikasi::class);
    }

    public function hki()
    {
        return $this->hasMany(Hki::class);
    }
}
