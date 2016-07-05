<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "follows";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id', 'business_id'
    ];
    
    /**
     * Relationship user tables.
     *
     * @return user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Relationship buisness tables.
     *
     * @return business
     */
    public function business()
    {
        return $this->belongsTo('App\Models\Business');
    }
}
