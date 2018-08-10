<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'category_uuid', 'price', 'active'];


}
