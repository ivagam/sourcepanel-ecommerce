<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'source_panel';
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;

   public function children()
    {
        return $this->hasMany(Category::class, 'subcategory_id', 'category_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'category_id');
    }
}
