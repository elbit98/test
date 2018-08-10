<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_characteristic;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;


class ImportController extends Controller
{

    use ConverterTrait;

    protected $Tires = NULL;
    protected $Drives = NULL;

    public function __construct(Request $request)
    {
        if(!is_null($request->Tires)) $this->Tires = ['name' => 'Tires', 'object' => $request->Tires];
        if(!is_null($request->Drives)) $this->Drives = ['name' => 'Drives', 'object' => $request->Drives];

        if (is_null($this->Tires) OR is_null($this->Drives)) self::errorResponse('null categories');

    }
    
    public function import()
    {

     if (!is_null($this->Tires)) $resultTires = $this->importHandler($this->Tires['object'], $this->Tires['name']);
     else $resultTires = 'success';

     if ($resultTires == 'success' && !is_null($this->Drives))
         $resultDrivers = $this->importHandler($this->Drives['object'], $this->Drives['name']);
     else $resultDrivers = 'success';

     return self::successResponse($resultDrivers);

    }

   public function importHandler($Category, $nameCategory) {

       $CategoryArray = $Category;
       $uuidCategory = Category::createCategory($nameCategory, $this->slug($nameCategory));

       $counter = 0;
       while ($counter !== 100)
       {

           $name = $this->valueGenerate($CategoryArray,'Brands').' '.$this->valueGenerate($CategoryArray,'Models');
           $uuidProduct = Product::createProduct($name, $this->slug($name),  $uuidCategory);

          if (isset($CategoryArray['Characteristics']))
              Product_characteristic::addCharacteristicInProduct($CategoryArray['Characteristics'], $uuidProduct);
          else return self::errorResponse('no Characteristics');

           $counter += 1;
       }

       return 'success';
   }


}