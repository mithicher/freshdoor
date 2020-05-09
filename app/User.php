<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function orders()
    {
        return $this->hasMany(\App\Order::class)->latest();
    }

    public function addresses()
    {
        return $this->hasMany(\App\Address::class);
    }

    public function hasAddress() 
    {
        return $this->addresses()->exists();
    }

    public function getDefaultAddress()
    {
        if ($this->addresses()->exists()) {
            return $this->addresses()->where('default', true)->first();
        }
        return;
    }
}
