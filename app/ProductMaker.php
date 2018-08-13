<?php

namespace App;

use Illuminate\Support\Str;
use App\Traits\ConverterTrait;

class ProductMaker
{

    use ConverterTrait;

    protected $category;
    protected $characteristics;

    public function __construct($category)
    {
        $this->category = $category;
        $this->characteristics = $category['Characteristics'];
    }

    public function makeCategory($name) {
        return Category::create($name);
    }

    public function makeProduct($uuidCategory) {

        $counter = 0;
        while ($counter++ < 5){

            $category = Category::where('uuid', $uuidCategory)->first();
            $product = new Product([
                'name' => Product::nameGenerate($this->category),
                'uuid' => Str::uuid(10),
                'slug' => str_slug(Product::nameGenerate($this->category)),
                'price' => mt_rand(100, 999)
            ]);

            $category->products()->save($product);

            $this->addCharacteristic($product->uuid);

        }

    }

    public function addCharacteristic($uuidProduct)
    {

        foreach ($this->characteristics as $key => $value) {

            $Characteristic = Characteristic::where('name', $key)->first();
            if (is_null($Characteristic)) $Characteristic = Characteristic::create(['name' => $key, 'slug' => $key]);

            $product = Product::where('uuid', $uuidProduct)->first();

               $val = $Characteristic::handler($value);

            $product->characteristic()->save($Characteristic, ['value' => $val]);

        }

    }

}


