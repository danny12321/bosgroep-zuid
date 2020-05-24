<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    //

    public function layers()
    {
        return $this->belongsToMany(Layer::class);
    }
}
