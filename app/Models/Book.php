<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'description', 'genre_id', 'status', 'rating', 'user_id', 'total_pages', 'last_page_read'
    ];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function getReadingProgressAttribute()
    {
        if (!$this->total_pages || $this->total_pages == 0) return 0;
        return round(($this->last_page_read / $this->total_pages) * 100);
    }
}
