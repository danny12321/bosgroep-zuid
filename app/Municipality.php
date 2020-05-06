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

    public function layers()
    {
        return $this->hasMany(Layer::class, 'municipality_id', 'id')->orderBy('title');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'municipality_id', 'id');
    }
}
