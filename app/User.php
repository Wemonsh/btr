<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return (boolean)$this->roles->where('name', 'admin')->count();
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
        // начиная с версии 5.1 метода array_fetch не существует
        //return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }

    use SoftDeletes;
}
