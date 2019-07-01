<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqCategory extends Model
{
    protected $table = 'faq_category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];

    use SoftDeletes;

    public function faqs() {
        return $this->hasMany('App\Faq');
    }
}
