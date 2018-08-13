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

    public static function valueGenerate($data) {

        return $data[array_rand($data, 1)];

    }


    public static function successResponse($data) {
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public static function errorResponse($data) {
        return response()->json(['success' => false, 'data' => $data], 406);
    }



}