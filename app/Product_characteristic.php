<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_characteristic extends Model
{

   protected $fillable = ['characteristic_id', 'product_uuid', 'value'];


    public static function addCharacteristicInProduct($Characteristics, $uuidProduct) {

        foreach ($Characteristics as $key => $value) {

           $Characteristic = Characteristic::where('name', $key)->first();

            if (is_null($Characteristic)) $Characteristic = Characteristic::create(['name' => $key, 'slug' => $key]);

            Product_characteristic::create([
                'characteristic_id' => $Characteristic->id,
                'product_uuid' => $uuidProduct,
                'value' => $value[array_rand($value, 1)],
            ]);

        }
    }


}
