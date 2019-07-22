<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkProduct extends Model
{
    public function images()
    {
        return $this->hasMany(BulkProductImage::class);
    }
}
