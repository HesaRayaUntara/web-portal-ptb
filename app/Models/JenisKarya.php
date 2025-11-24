<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKarya extends Model
{
    use HasFactory;

    protected $table = 'jenis_karya';
    protected $fillable = ['j_karya'];
    protected $primaryKey = 'id_jenis_karya';
    public $timestamps = true;
}
