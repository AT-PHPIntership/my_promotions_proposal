<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = "promotions";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title', 'intro', 'content', 'image', 'expired_day', 'business_id', 'category_id'
    ];
    
    /**
     * Relationship business tables.
     *
     * @return business
     */
    public function business()
    {
        return $this->belongsTo('App\Models\Business');
    }
    
    /**
     * Relationship category tables.
     *
     * @return category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    /**
     * Relationship rating tables.
     *
     * @return ratings
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
