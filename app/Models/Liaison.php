<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liaison extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alumnus()
    {
        return $this->hasMany(Alumnus::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
