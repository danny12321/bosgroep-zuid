<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    //
    protected $fillable = [
        'name',
        'parent_id',
        'layer_id',
        'municipality_id',
    ];

    public function layer()
    {
        return $this->hasOne(Layer::class, 'id', 'layer_id');
    }

    public function parent()
    {
        return $this->hasOne(Selection::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Selection::class, 'parent_id', 'id')->orderBy('layer_id');
    }
}
