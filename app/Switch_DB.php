<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switch_DB extends Model
{
    protected $fillable = [
        'destination',
        'email'
    ];

    //timestamp bullshit
    public $timestamps = false;
}
