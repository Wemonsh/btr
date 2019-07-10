<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';
    protected $fillable = ['image', 'headline', 'description', 'button_text', 'link', 'button_exists'];

    use SoftDeletes;
}
