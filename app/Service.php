<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'gaming_services';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'description', 'id_game'];
    public $timestamps = false;
}
