<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_fasilitas', 'deskripsi', 'foto'];
    protected $primaryKey = 'id_fasilitas';
    public $timestamps = true;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id_fasilitas';
    }
}
