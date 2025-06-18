<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'country',
        'zip_code',
        'domains',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
