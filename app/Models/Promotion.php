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
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function business()
    {
        return $this->belongsTo('App\Models\Business');
    }
    
    /**
     * Relationship category tables.
     *
     * @return array
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    /**
     * Relationship rating tables.
     *
     * @return array
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
