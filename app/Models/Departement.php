<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function study()
    {
        return $this->hasMany(Study::class);
    }

    public function alumnus()
    {
        return $this->hasMany(Alumnus::class);
    }
}
