<?php
namespace App\Helpers;
Use Storage as OriginalStorage;
use File;
Class Storage{

    public static function get(object $collect, string $type, string $method) :string
    {
        $path = 'storage/';
        if (File::exists($path . $collect->getFile($type, $method)) && is_file($path . $collect->getFile($type, $method))) {
            $res = asset($path . $collect->getFile($type, $method));
        } else {
            if($type === 'video' || $type === 'trailer')
                $res = $path = 'video/default.mp4';
            else
                $res =  'img/default.jpg';

//        $photo = asset($collect->getFile('photo', 'first'));
        }

        return $res;
    }


}
