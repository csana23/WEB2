<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switches extends Model
{
    protected $fillable = [
        'destination',
        'email'
    ];

    //timestamp bullshit
    public $timestamps = false;
}
