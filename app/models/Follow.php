<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
 	
 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'business_id'
    ];
}
