<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $table = 'admins';
    
    protected $fillable = [
        'username', 'password', 'firstname', 'lastname', 'email', 'phone', 'profile', 'status', 'remember_token', 'logged_in'
    ];

}