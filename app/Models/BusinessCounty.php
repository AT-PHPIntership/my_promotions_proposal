<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCounty extends Model
{
    protected $table = "business_counties";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'business_id', 'county_id'
    ];
}
