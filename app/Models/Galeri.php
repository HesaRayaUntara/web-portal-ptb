<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $fillable = ['judul', 'deskripsi', 'kategori_galeri_id', 'tipe', 'foto', 'youtube_url'];
    protected $primaryKey = 'id_galeri';
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_galeri_id', 'id_kategori_galeri');
    }
}

