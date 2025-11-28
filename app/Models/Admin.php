<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'auth';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Set the password attribute (hash it automatically)
     * Hanya hash jika password belum di-hash (tidak dimulai dengan $2y$)
     */
    public function setPasswordAttribute($value)
    {
        // Jika password sudah di-hash (dimulai dengan $2y$), jangan hash lagi
        if (strlen($value) === 60 && strpos($value, '$2y$') === 0) {
            $this->attributes['password'] = $value;
        } else {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
