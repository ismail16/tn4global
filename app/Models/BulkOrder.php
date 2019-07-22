<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkOrder extends Model
{
    public $fillable = [
        'bulk_products_id',
        'name',
        'phone',
        'email',
        'address',
        'city',
        'country',
        'message',
    ];
}
