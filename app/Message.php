<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'doctor_id', 'name_user', 'surname_user', 'telephone_user', 'message_user'
    ];


    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
