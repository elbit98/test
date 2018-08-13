<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'uuid';
    protected $fillable = ['name', 'uuid', 'slug', 'category_uuid', 'price', 'active'];


    public static function nameGenerate($data)
    {
        return $data['Brands'][array_rand($data['Brands'], 1)] . ' ' . $data['Models'][array_rand($data['Models'], 1)];
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uuid', 'uuid');
    }

    public function characteristic() {
        return $this->belongsToMany(Characteristic::class, 'product_characteristics', 'characteristic_id', 'product_uuid');
    }

}
