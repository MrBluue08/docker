<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class ImageController extends Controller
{
    public static function storeImage(Request $request, $path, $fieldName = "logo", $name){
        try{
            $image = $request->file($fieldName);
            if($image === null) throw new \Exception;
            $imageName = $name . "." . $image->extension();
            $imagePath = $image->storeAs($path, $imageName, "public");
            return $imageName;
        } catch(\Exception $e){
            echo "Image upload error: " . $e->getMessage();
            $route = "default.png";
            return $route;
        }
    }
}