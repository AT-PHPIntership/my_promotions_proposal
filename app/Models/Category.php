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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion');
    }

    /**
     * Relationship childrent category tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    /**
     * Relationship parent category tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    /**
     * Get the Category Parent.
     *
     * @return string
     */
    public function getCategoryParentAttribute()
    {
        if ($this->parent_id == 0) {
            return trans('labels.root');
        } else {
            return $this->parent['name'];
        }
    }
}
