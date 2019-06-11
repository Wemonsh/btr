<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    protected $table = 'gaming_services';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'description', 'game_id'];
    public $timestamps = false;

    use SoftDeletes;

    public function game(){
        return $this->hasOne('App\Game','id','game_id');
    }

    public function category() {
        return $this->belongsToMany('App\ServiceCategory', 'service_category', 'services_id','category_id');
    }
}
