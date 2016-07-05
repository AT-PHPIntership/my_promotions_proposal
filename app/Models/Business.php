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
     * @return promotions
     */
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion');
    }
    
    /**
     * Relationship follow tables.
     *
     * @return follows
     */
    public function follows()
    {
        return $this->hasMany('App\Models\Follow');
    }
    
    /**
     * Relationship user tables.
     *
     * @return user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Relationship city tables.
     *
     * @return cities
     */
    public function cities()
    {
        return $this->belongsToMany('App\Models\City', 'business_cities');
    }
    
    /**
     * Relationship county tables.
     *
     * @return counties
     */
    public function counties()
    {
        return $this->belongsToMany('App\Models\County', 'business_counties');
    }
}
