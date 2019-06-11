<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategoryContent extends Model
{
    protected $table = 'gaming_services_category_content';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id'];
    public $timestamps = false;

    use SoftDeletes;

    public function gamingServices() {
        return $this->hasOne('App\ServiceCategory', 'id', 'category_id');
    }
}
