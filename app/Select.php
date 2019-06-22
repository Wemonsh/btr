<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Select extends Model
{
    protected $fillable = ['name', 'placeholder'];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
