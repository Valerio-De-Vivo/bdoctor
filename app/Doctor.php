<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 'surname', 'address', 'city', 'cv', 'telephone', 'photo', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
