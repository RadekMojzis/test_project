<?php
use Intervention\Image\ImageManagerStatic as Image;

if (! function_exists('width')) {
    function width($file, $value)
    {
        $filepath = storage_path('app/'.$file);
        $img=Image::make($filepath);
        $img->resize($value, null)->save($filepath);

    }
}

if (! function_exists('height')) {
    function height($file, $value)
    { 
        $filepath = storage_path('app/'.$file);
        
        $img = Image::make($filepath);
        $img->resize(null, $value)->save($filepath);
    }
}