<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{

   protected $fillable = ['characteristic_id', 'product_uuid', 'value'];



}
