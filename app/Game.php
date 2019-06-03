<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'card_image', 'full_image', 'background'];
//    protected $timestamps = false;

    public function gamingServices() {
        return $this->hasMany('App\Service', 'id_game', 'id');
    }

}
