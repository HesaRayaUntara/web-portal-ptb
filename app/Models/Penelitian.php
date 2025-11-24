<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'penelitian';
    protected $fillable = ['dosen_id', 'judul_penelitian', 'tahun'];
    protected $primaryKey = 'id_penelitian';
    public $timestamps = true;

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id_dosen');
    }
}
