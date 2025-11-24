<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hki extends Model
{
    use HasFactory;

    protected $table = 'hki';

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
