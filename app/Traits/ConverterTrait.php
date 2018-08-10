<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 28.05.2018
 * Time: 12:47
 */

namespace App\Traits;


trait ConverterTrait
{

    public function slug($data) {
        return str_replace(' ', '-', mb_strtolower($data));
    }

    public function valueGenerate($data, $name) {


      if(!array_key_exists($name, $data))
          return response()->json(['success' => false, 'data' => 'no array key'.$name], 406);
     else
        return $data[$name][array_rand($data[$name], 1)];

    }


    public static function successResponse($data) {
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public static function errorResponse($data) {
        return response()->json(['success' => false, 'data' => $data], 406);
    }



}