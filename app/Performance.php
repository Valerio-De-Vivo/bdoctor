<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
        'performance'
    ];


    public function doctors()
    {
    return $this->belongsToMany('App\Doctor');
    }
}
