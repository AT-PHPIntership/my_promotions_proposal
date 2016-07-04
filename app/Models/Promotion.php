<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $_table = "promotions";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title', 'intro', 'content', 'image', 'expired_day', 'business_id', 'category_id'
    ];
}
