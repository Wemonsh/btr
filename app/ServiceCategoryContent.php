<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategoryContent extends Model
{
    protected $table = 'gaming_services_category_content';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id'];
    public $timestamps = false;

    public function gamingServices() {
        return $this->hasOne('App\ServiceCategory', 'category_id', 'id');
    }
}
