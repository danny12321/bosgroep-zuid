<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'municipality_id',
        'guidespecie_id',
        'problem_id',
        'pdf_path',
    ];
}
