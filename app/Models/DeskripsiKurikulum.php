<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiKurikulum extends Model
{
    use HasFactory;

    protected $table = 'deskripsi_kurikulum';

    protected $fillable = [
        'deskripsi_semester_1_2',
        'deskripsi_semester_3_4',
        'deskripsi_semester_5_6',
        'deskripsi_semester_7_8',
    ];
}
