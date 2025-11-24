<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['judul', 'isi', 'kategori_berita_id', 'penulis', 'slug', 'image', 'tanggal_publikasi', 'status'];
    protected $primaryKey = 'id_berita';
    public $timestamps = true;
    protected $casts = ['tanggal_publikasi' => 'date'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id_kategori_berita');
    }
}
