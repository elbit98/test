<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = ['id', 'name', 'slug', 'multiple_choice'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_characteristics', 'product_uuid', 'characteristic_id');
    }

}
