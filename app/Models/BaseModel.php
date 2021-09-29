<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
trait BaseModel {


    public function getFile($type , $method)
    {
       $path = $this->files()->where('type',$type)->$method();
       return $path ? $path->file :null;
    }
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getCreatedAtAttribute($data)
    {
        return Carbon::parse($data)->format('d-m-Y');
    }
    //-
 }