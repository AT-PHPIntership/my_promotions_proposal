<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    protected $table = 'admin_users';
 	
 	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

}
