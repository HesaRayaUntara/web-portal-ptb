<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'semester',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'status_mata_kuliah',
        'sks_kuliah',
        'sks_praktikum',
    ];
}
