<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function ratings() {
        return $this->hasMany('App\Models\Rating');
    }
    
    public function follows() {
        return $this->hasMany('App\Models\Follow');
    }
    
    public function business(){
        return $this->hasOne('App\Models\Business');
    }
}
