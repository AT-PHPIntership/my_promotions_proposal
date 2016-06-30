<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Business_city extends Model
{
    protected $table = 'business_cities';
 	
 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_id', 'city_id'
    ];

}
