<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'category_uuid', 'price', 'active'];


}
