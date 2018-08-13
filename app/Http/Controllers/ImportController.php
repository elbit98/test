<?php

namespace App\Http\Controllers;

use App\ProductMaker;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    use ConverterTrait;

    public function test() {


    }

    public function import(Request $request)
    {

        foreach ($request->all() as $nameCategory => $Category) {

            $maker = new ProductMaker($Category);
            $maker->makeProduct($maker->makeCategory($nameCategory));

        }

        return self::successResponse('success');

    }


}