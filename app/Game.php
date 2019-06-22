<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'card_image', 'full_image', 'background'];
    public $timestamps = false;

    use SoftDeletes;

    public function categories() {
        return $this->hasMany(Category::class);
    }

}
