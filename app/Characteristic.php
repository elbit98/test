<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = ['name', 'slug', 'multiple_choice'];

}
