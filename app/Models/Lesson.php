<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Laravel\Cashier\Billable;

/**
 * @method static find(mixed $id)
 */
class Lesson extends Model
{
    protected $guarded = [];
    use HasFactory, BaseModel, Billable;


    //-------------
    //  RELATIONS
    //-------------
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'instructor_id', 'id');

    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_lessons');
    }

    public function commentable()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    
    public function voteable()
    {
        return $this->morphMany('App\Models\Vote' , 'voteable');
    }
    public function products()
    {
        //return $this->morphMany('App\Models\MyProduct' , 'products' );
       // return $this->morphedByMany('App\Models\User', 'products', 'my_products', 'user_id' , 'products_id');
        return $this->morphToMany('App\Models\User', 'products', 'my_products', 'products_id' , 'user_id');
    }

    public function transaction()
    {
        return $this->morphMany('App\Models\Transaction','transactions');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');

    }

}
