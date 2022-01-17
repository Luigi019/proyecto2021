<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory , BaseModel;

    protected $fillable = ['tag','active','slug'];
    //-------------
    //  RELATIONS
    //-------------
    public function courses()
    {
        return $this->morphedByMany('App\Models\Post' , 'taggable');
    }

    public function Lessons()
    {
        return $this->morphedByMany('App\Models\Lesson' , 'taggable');
    }
}
