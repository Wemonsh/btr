<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'description', 'game_id'];
    public $timestamps = false;

    use SoftDeletes;

    public function game(){
        return $this->hasOne('App\Game','id','game_id');
    }

    public function selects()
    {
        return $this->belongsToMany(Select::class);
    }

}
