<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shortBody()
    {
        return Str::words(strip_tags($this->body), 7);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
