<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    // Logic to apply some attribute casting setting
    public $timestamps = false;
    public $hidden = ["_method", "_token", "remember_token"];
    public $fillable = ["name", "email", "phone", "image"];

    
}
