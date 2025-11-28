<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $table = 'log_activities';

    protected $fillable = [
        'nama_admin',
        'aktivitas',
        'data_yang_diubah',
        'waktu',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];
}
