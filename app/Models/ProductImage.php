<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $connection = 'source_panel';
    protected $primaryKey = 'image_id';

    protected $table = 'product_images';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}

?>