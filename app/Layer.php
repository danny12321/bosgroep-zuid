<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    //
    protected $fillable = [
        'title',
        'name',
        'municipality_id'
    ];
}
