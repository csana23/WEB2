<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'destination',
        'intro',
        'desc',
        'from',
        'to',
        'max'
    ];

    //timestamp bullshit
    public $timestamps = false;
}
