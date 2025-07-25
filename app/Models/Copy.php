<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    protected $fillable = [
        'book_id',
        'status',
        'barcode',
        'condition',
        'notes'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
