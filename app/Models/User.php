<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'username', 'phone_no', 'division_id', 'district_id', 'street_address', 'ip_address', 'remember_token', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
