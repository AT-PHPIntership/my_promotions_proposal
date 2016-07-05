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
    
    /**
     * Relationship rating tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
    
    /**
     * Relationship follow tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongToMany
     */
    public function followedBusinesses()
    {
        return $this->belongToMany('App\Models\Business', 'follows');
    }
    
    /**
     * Relationship business tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function business()
    {
        return $this->hasOne('App\Models\Business');
    }
}
