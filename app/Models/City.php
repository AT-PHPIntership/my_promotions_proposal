<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name'
    ];
    
    /**
     * Relationship business tables.
     *
     * @return array
     */
    public function businesses()
    {
        return $this->belongsToMany('App\Models\Business', 'business_cities');
    }
    
    /**
     * Relationship county tables.
     *
     * @return array
     */
    public function counties()
    {
        return $this->hasMany('App\Models\County');
    }
}
