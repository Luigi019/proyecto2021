<?php

namespace App\Models;

use App\Scopes\CourseScope;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    protected $fillable = [
        'id' ,
        'title' ,
        'description' ,
        'type' ,
        'instructor_id',
        'price',
        'slug',
        'content',
        'city_id',
        'stripe_id'
    ];
    use HasFactory , SoftDeletes, BaseModel;

    //-------------
    //  RELATIONS
    //-------------
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag' , 'taggable');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Events');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'instructor_id' ,'id');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson' , 'course_lessons');
    }


    public function commentable()
    {
        return $this->morphMany('App\Models\Comment' , 'commentable');
    }
    public function voteable()
    {
        return $this->morphMany('App\Models\Vote' , 'voteable');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');

    }

    public function products()
    {
        //return $this->morphMany('App\Models\MyProduct' , 'products' );
        return $this->morphToMany('App\Models\User', 'products', 'my_products', 'products_id' , 'user_id');
    }

    public function transaction()
    {
        return $this->morphMany('App\Models\Transaction','transactions');
    }

    //-------------
    //  SCOPES
    //-------------

    public function scopeGetType($query, $type){
        return $query->where('type', $type);
    }
}
