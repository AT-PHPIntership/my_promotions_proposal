<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'counties';
 	
 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id'
    ];
}
