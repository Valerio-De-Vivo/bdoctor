<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = [
        'type', 
        'price',
        'hours'
    ];


    public function doctors()
    {
    return $this->belongsToMany('App\Doctor');
    }
}
