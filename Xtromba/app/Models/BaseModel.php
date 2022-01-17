<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait BaseModel
{
    use HasFactory;

    public function files()
    {
        return $this->morphMany('App\Models\Files' , 'files');
    }


    //-------------
    //  MUTATORS
    //-------------

    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
    //-------------
    //  ACCESORS
    //-------------
    public function getCreatedAtAttribute($data)
    {
        return Carbon::parse($data)->format('d-m-Y');
    }

    //-------------
    //  SCOPES
    //-------------
    public function ScopeGetFile($query, string $type , string $return)
    {
     $files = $this->files()->where('type' , $type)->$return();
     $arrFiles = [];

     if($return === 'get'){
        foreach($files as $key => $file)
        {
            $arrFiles[$key]['file'] = 'storage/'.$file->file ?? null ;
            $arrFiles[$key]['title'] = $file->title ?? null ;
            $arrFiles[$key]['id'] = $file->id ??null ;
        }

        return $arrFiles;
     }elseif($return === 'first')
     {
        if(!$files)
        {
            $arrFiles['file'] = asset('video/default.mp4');
               $arrFiles['id'] =$files->id ?? null;

           if($type === 'photo')
           $arrFiles['file'] =asset('img/default.jpg');
                       $arrFiles['title'] =$files->title ?? null;
        }
        else {
            $arrFiles['file'] = 'storage/'.$files->file ?? null;
            $arrFiles['id'] =$files->id ?? null;
            $arrFiles['title'] =$files->title ?? null;
        }
     }
      return $arrFiles;
    }



}
