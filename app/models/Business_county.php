<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Business_county extends Model
{
    protected $table = 'business_counties';
 	
 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_id', 'county_id'
    ];

}
