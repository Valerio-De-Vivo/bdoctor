<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'doctor_id', 'name_user', 'surname_user', 'email_user', 'vote_user', 'review_user'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }



}
