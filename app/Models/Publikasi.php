<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = 'publikasi';

    protected $fillable = [
        'dosen_id',
        'judul_karya',
        'jenis_karya',
        'tahun',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
