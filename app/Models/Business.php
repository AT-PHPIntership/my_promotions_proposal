<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $_table = "businesses";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'phone', 'logo', 'description', 'count_follow', 'user_id'
    ];
    
    public function promotions(){
        return $this->hasMany('App\Models\Promotion');
    }
    
    public function follows() {
        return $this->hasMany('App\Models\Follow');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function cities(){
        return $this->belongsToMany('App\Models\City', 'business_cities');
    }
    
    public function counties(){
        return $this->belongsToMany('App\Models\County', 'business_counties');
    }
    
}
