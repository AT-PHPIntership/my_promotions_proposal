<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'content', 'score', 'user_id', 'promotion_id', 'created_day'
    ];
    
    /**
     * Relationship promotion tables.
     *
     * @return promotion
     */
    public function promotion()
    {
        return $this->belongsTo('App\Models\Promotion');
    }
    
    /**
     * Relationship user tables.
     *
     * @return user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
