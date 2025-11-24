<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hki extends Model
{
    use HasFactory;

    protected $table = 'hki';
    protected $fillable = ['dosen_id', 'judul_karya', 'jenis_karya', 'tahun'];
    protected $primaryKey = 'id_hki';
    public $timestamps = true;

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id_dosen');
    }
}
