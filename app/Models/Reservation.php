<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'copy_id',
        'reserved_at',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }
}
