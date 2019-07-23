<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'description', 'game_id'];
    public $timestamps = false;

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['selects'];

    public function game(){
        return $this->hasOne('App\Game','id','game_id')->withTrashed();
    }

    public function selects()
    {
        return $this->belongsToMany(Select::class);
    }
}
