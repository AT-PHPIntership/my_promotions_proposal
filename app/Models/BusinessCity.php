<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCity extends Model
{
    protected $table = "business_cities";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'business_id', 'city_id'
    ];
}
