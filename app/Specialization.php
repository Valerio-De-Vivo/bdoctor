<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'specialization'
    ];


    public function doctors()
    {
    return $this->belongsToMany('App\Doctor');
    }

    
}
