<?php

namespace App\Models;


trait BaseModel {

    public function getFile($type , $method)
    {
       $path = $this->files()->where('type',$type)->$method();
       return $path ? $path->file :null;
    }
 }