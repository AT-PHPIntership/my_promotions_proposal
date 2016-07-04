<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $_table = "cities";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name'
    ];
    
    public function businesses(){
        return $this->belongsToMany('App\Models\Business', 'business_cities');
    }
    
    public function counties(){
        return $this->hasMany('App\Models\County');
    }
}
