<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $fillable = [
        'brand_name',        
        'domains',
        'file_path',
        'file_type',
        'created_by'
    ];
    
}
