<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $_table = "follows";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id', 'business_id'
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function business() {
        return $this->belongsTo('App\Models\Business');
    }
}
