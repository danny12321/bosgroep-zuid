<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'legend',
        'lat',
        'long',
        'logo',
        'zoom'
    ];

    public function layers()
    {
        return $this->hasMany(Layer::class, 'municipality_id', 'id')->orderBy('title');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'municipality_id', 'id');
    }

    public function guide_species()
    {
        return $this->hasMany(GuideSpecie::class, 'municipality_id', 'id');
    }

    public function problems()
    {
        return $this->hasMany(Problem::class, 'municipality_id', 'id');
    }

    public function layers_without_guidespecie()
    {
        return $this->hasMany(Layer::class, 'municipality_id', 'id')->where('guidespecie_id', '=', null)->orderBy('title');
    }
}
