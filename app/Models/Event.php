<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function liaison()
    {
        return $this->belongsTo(Liaison::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function alumnus()
    {
        return $this->belongsToMany(Alumnus::class);
    }

    public function shortDesc()
    {
        return Str::words(strip_tags($this->description), 7);
    }
}
