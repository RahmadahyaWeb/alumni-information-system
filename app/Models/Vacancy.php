<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alumnus()
    {
        return $this->belongsToMany(Alumnus::class, 'alumnus_vacancy');
    }
}
