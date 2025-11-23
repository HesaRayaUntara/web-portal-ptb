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
        'kode_mk',
        'nama_mk',
        'jenis_mk',
        'sks_kuliah',
        'sks_praktikum',
    ];
}
