<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'properties', 'cost', 'images', 'game_id', 'service_id', 'seller_id', 'customer_id', 'paid'];
    public $timestamps = true;

    use SoftDeletes;

    public function game () {
        return $this->hasOne('App\Game','id','game_id');
    }

    public function service () {
        return $this->hasOne('App\Category','id','service_id');
    }

    public function seller () {
        return $this->hasOne('App\User','id','seller_id');
    }

    public function customer () {
        return $this->hasOne('App\User','id','customer_id');
    }
}

