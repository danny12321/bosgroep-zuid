<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    protected $fillable = [
        'name',
        'municipality_id'
    ];
}
