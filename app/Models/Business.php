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
     * @return array
     */
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion');
    }
    
    /**
     * Relationship follow tables.
     *
     * @return array
     */
    public function follows()
    {
        return $this->hasMany('App\Models\Follow');
    }
    
    /**
     * Relationship user tables.
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Relationship city tables.
     *
     * @return array
     */
    public function cities()
    {
        return $this->belongsToMany('App\Models\City', 'business_cities');
    }
    
    /**
     * Relationship county tables.
     *
     * @return array
     */
    public function counties()
    {
        return $this->belongsToMany('App\Models\County', 'business_counties');
    }
}
