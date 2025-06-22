<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'description', 'genre_id', 'status', 'rating', 'user_id'
    ];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
