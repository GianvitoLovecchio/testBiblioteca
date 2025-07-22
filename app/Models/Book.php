<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'published_at',
        'description',
        'cover_image',
        'available_copies',
        'category_id',
    ];

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
