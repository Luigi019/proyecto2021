<?php

function defaultImg()
{
    return 'img/default.jpg';
}

function img($collect = null)
{


    if (!$collect) return ('img/default.jpg');

    $path = 'storage/';
    if (File::exists($path . $collect->getFile('photo', 'first')) && is_file($path . $collect->getFile('photo', 'first'))) {
        $photo = asset($path . $collect->getFile('photo', 'first'));
    } else {
        $photo = $path = 'img/default.jpg';
//        $photo = asset($collect->getFile('photo', 'first'));
    }

    return $photo;
}


/**
 * @param object $collect
 * @param string $type
 * @param string $method
 * @return string
 */
function getFile(object $collect, string $type, string $method)
{
    $path = 'storage/';
    if (File::exists($path . $collect->getFile($type, $method)) && is_file($path . $collect->getFile($type, $method))) {
        $res = asset($path . $collect->getFile($type, $method));
    } else {
        if($type === 'video' || $type === 'trailer')
            $res = $path = 'video/default.mp4';
        else
            $res = ($path . 'img/default.jpg');

//        $photo = asset($collect->getFile('photo', 'first'));
    }

    return $res;
}
