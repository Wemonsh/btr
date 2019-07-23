<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Select extends Model
{
    protected $fillable = ['name', 'placeholder'];
    public $timestamps = false;

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['content'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTrashed();
    }

    public function content()
    {
        return $this->hasMany(Content::class)->withTrashed();
    }
}
