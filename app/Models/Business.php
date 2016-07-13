<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = "businesses";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'phone', 'logo', 'description', 'count_follow', 'user_id'
    ];
    
    /**
     * Relationship promotion tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion');
    }
    
    /**
     * Relationship follow tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongToMany
     */
    public function followedUsers()
    {
        return $this->belongToMany('App\Models\Business', 'follows');
    }
    
    /**
     * Relationship user tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Relationship city tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany('App\Models\City', 'business_cities');
    }
    
    /**
     * Relationship county tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function counties()
    {
        return $this->belongsToMany('App\Models\County', 'business_counties');
    }

    /**
     * Get the UserName.
     *
     * @return string
     */
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
