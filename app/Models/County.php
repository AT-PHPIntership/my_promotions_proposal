<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = "counties";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'city_id'
    ];
    
    /**
     * Relationship business tables.
     *
     * @return businesses
     */
    public function businesses()
    {
        return $this->belongsToMany('App\Models\Business', 'business_counties');
    }
    
    /**
     * Relationship city tables.
     *
     * @return city
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
