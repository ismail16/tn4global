<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['name', 'mobile', 'email','website', 'subject', 'message'];
}
