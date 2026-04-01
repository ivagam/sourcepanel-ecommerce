<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}