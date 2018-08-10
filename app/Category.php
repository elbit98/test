<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'active', 'page_products_count'];

    public static function createCategory($name, $slug) {

        try {
            $category = new Category();
            $category->name = $name;
            $category->uuid = Str::uuid(10);
            $category->slug = $slug;
            $category->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }

        return $category->uuid;

    }

}

