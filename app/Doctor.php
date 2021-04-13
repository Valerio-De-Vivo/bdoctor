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

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function message()
    {
        return $this->hasMany('App\Message');
    }

    public function specializations()
    {
    return $this->belongsToMany('App\Specialization');
    }

    public function performance()
    {
    return $this->belongsToMany('App\Performance');
    }

    public function advertise()
    {
    return $this->belongsToMany('App\Advertise');
    }


}
