<?php

namespace App;

use Illuminate\Support\Str;

class ProductMaker
{
    public static function createCategory($name, $slug) {

        $category = new Category();
        $category->name = $name;
        $category->uuid = Str::uuid(10);
        $category->slug = $slug;
        $category->save();

        return $category->uuid;

    }

    public static function createProduct($name, $slug, $uuidCategory) {

        $product = new Product();
        $product->name = $name;
        $product->uuid = Str::uuid(10);
        $product->slug = $slug;
        $product->category_uuid = $uuidCategory;
        $product->price = mt_rand(100,999);

        $product->save();

        return $product->uuid;

    }

    public static function addCharacteristicInProduct($Characteristics, $uuidProduct) {

        foreach ($Characteristics as $key => $value) {

            $Characteristic = Characteristic::where('name', $key)->first();

            if (is_null($Characteristic)) $Characteristic = Characteristic::create(['name' => $key, 'slug' => $key]);

            $ProductCharacteristic = new ProductCharacteristic();
            $ProductCharacteristic->characteristic_id = $Characteristic->id;
            $ProductCharacteristic->product_uuid = $uuidProduct;
            $ProductCharacteristic->value = $value[array_rand($value, 1)];
            $ProductCharacteristic->save();

        }
    }

}


