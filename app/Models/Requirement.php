<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = ['title', 'description','name', 'email','phone', 'address', 'city','country'];
}
