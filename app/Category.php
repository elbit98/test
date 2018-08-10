<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $fillable = ['name', 'uuid', 'slug', 'active', 'page_products_count'];



}

