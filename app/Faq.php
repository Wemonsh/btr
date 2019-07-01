<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['question', 'answer', 'id_category'];

    public function faqCategory(){
        return $this->hasOne('App\FaqCategory','id','id_category');
    }
}
