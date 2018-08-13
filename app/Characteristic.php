<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ConverterTrait;

class Characteristic extends Model
{

    use ConverterTrait;

    protected $fillable = ['id', 'name', 'slug', 'multiple_choice'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_characteristics', 'product_uuid', 'characteristic_id');
    }

    public static function handler($value) {
        if (array_key_exists('start', $value)) {
            $is = range($value['start'], $value['end'], $value['step']);
            $val = self::valueGenerate($is);
        } else {
            $val = self::valueGenerate($value);
        }

        return $val;

    }

}
