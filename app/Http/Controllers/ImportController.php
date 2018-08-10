<?php

namespace App\Http\Controllers;

use App\ProductMaker;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;


class ImportController extends Controller
{

    use ConverterTrait;

    protected $categories;

    public function __construct(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            $this->categories[] = ['name' => $key, 'object' => $value];
        }

    }

    public function import()
    {

        foreach ($this->categories as $cat) {
            $this->importHandler($cat['object'], $cat['name']);
        }

        return self::successResponse('success');

    }

    public function importHandler(array $Category, $nameCategory)
    {

        $CategoryArray = $Category;
        $uuidCategory = ProductMaker::createCategory($nameCategory, str_slug($nameCategory));

        $counter = 0;
        while (++$counter < 5){

            $name = $this->valueGenerate($CategoryArray, 'Brands') . ' ' . $this->valueGenerate($CategoryArray, 'Models');
            $uuidProduct = ProductMaker::createProduct($name, str_slug($name), $uuidCategory);

            if (isset($CategoryArray['Characteristics']))
                ProductMaker::addCharacteristicInProduct($CategoryArray['Characteristics'], $uuidProduct);
            else return self::errorResponse('no Characteristics');

        }

    }


}