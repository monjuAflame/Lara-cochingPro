<?php

namespace App;
use File;
use Storage;


class FileUpload 
{
    public static function photo($request,$filename,$default=""){
        $name = "";
        $photo= $request->photo;
        if ($request->hasFile($filename)) {
            
            $extention = $photo->getClientOriginalExtension();
            $name = rand(11111,99999).".".date('Y-m-d').".".time().".".$extention;
                Storage::disk('photo')->put($name,File::get($photo));
            $name=$name;
        } else {
            $name = $default;
        }
        return $name;
    }
    public static function adminstrationImage($request,$filename,$default=""){
        $name = "";
        $photo= $request->image;
        if ($request->hasFile($filename)) {
            
            $extention = $photo->getClientOriginalExtension();
            $name = rand(11111,99999).".".date('Y-m-d').".".time().".".$extention;
                Storage::disk('adminPhoto')->put($name,File::get($photo));
            $name=$name;
        } else {
            $name = $default;
        }
        return $name;
    }
}
