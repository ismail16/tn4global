<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
  public $fillable = [
    'order_id',
    'product_id'
  ];
}
