<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideSpecie extends Model
{
    //
    protected $fillable = [
        'name',
        'municipality_id'
    ];
}
