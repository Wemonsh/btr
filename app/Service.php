<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'gaming_services';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'id_game'];
//    protected $timestamps = false;
}
