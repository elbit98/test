<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'active', 'page_products_count'];


    public static function create($name) {

        $category = new Category();
        $category->name = $name;
        $category->uuid = Str::uuid(10);
        $category->slug = str_slug($name);
        $category->save();

        return $category->uuid;

    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_uuid', 'uuid');
    }

}

