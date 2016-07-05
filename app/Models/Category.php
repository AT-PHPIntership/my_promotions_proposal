<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'parent_id'
    ];
    
    /**
     * Relationship promotion tables.
     *
     * @return array
     */
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion');
    }
}
