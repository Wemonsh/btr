<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'select_id'];
    public $timestamps = false;

    use SoftDeletes;

    public function select()
    {
        return $this->hasOne('App\Select', 'id', 'select_id');
    }
}
