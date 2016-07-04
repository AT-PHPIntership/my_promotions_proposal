<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $_table = "counties";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'city_id'
    ];
    
    public function businesses(){
        return $this->belongsToMany('App\Models\Business', 'business_counties');
    }
    
    public function city(){
        return $this->belongsTo('App\Models\City');
    }
}
