<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'lat',
        'long'
    ];
}
