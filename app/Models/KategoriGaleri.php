<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    use HasFactory;

    protected $table = 'kategori_galeri';
    protected $fillable = ['nama'];
    protected $primaryKey = 'id_kategori_galeri';
    public $timestamps = true;

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'kategori_galeri_id', 'id_kategori_galeri');
    }
}

