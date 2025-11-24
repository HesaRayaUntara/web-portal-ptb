<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;

    protected $table = 'pengabdian';

    protected $fillable = [
        'dosen_id',
        'judul_pengabdian',
        'tahun',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
