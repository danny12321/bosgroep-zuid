<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    protected $fillable = [
        'question',
    ];


    public function answers()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id', 'id');
    }
}
