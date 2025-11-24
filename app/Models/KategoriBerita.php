<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $fillable = ['nama'];
    protected $primaryKey = 'id_kategori_berita';
    public $timestamps = true;

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id_kategori_berita');
    }
}
