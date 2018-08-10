<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'category_uuid', 'price', 'active'];

    public static function createProduct($name, $slug, $uuidCategory) {


        try {
            $product = new Product();
            $product->name = $name;
            $product->uuid = Str::uuid(10);
            $product->slug = $slug;
            $product->category_uuid = $uuidCategory;
            $product->price = mt_rand(100,999);

            $product->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }

        return $product->uuid;

    }

}
