<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}