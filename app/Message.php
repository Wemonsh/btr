<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'order_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
