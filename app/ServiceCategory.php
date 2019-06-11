<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    protected $table = 'gaming_services_category';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'placeholder', 'service_id'];
    public $timestamps = false;

    use SoftDeletes;

    public function service() {
        return $this->belongsToMany('App\Service', 'service_category', 'services_id','category_id');
    }

}
