<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Laravel\Cashier\Billable;


/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $is_admin
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Course[] $courses
 * @property Lesson[] $lessons
 * @package App
 * @mixin Builder
 */
class User extends Authenticate implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles, SoftCascadeTrait, BaseModel, Billable;

    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'is_admin' => 'required',
    ];
    protected $softCascade = ['comments', 'lessons'];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //================================================================
    // RELATIONS
    //================================================================


    /**
     * Undocumented function
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'instructor_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'user_id', 'id');
    }

    public function products($type)
    {

        //return $this->hasMany('App\Models\MyProduct', 'user_id' ,'id');
        //return $this->morphedByMany('App\Models\Course', 'products', 'my_products', 'user_id', 'id', 'id');
       // return $this->morphedByMany('App\Models\Course', 'products', 'my_products', 'user_id' , 'products_id');
        return $this->morphedByMany('App\Models\\'.$type, 'products', 'my_products', 'user_id' , 'products_id');

    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Comment');

    }
    public function getVotes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Vote');

    }
    public function vote()
    {  
        return $this->morphMany('App\Models\Vote' , 'voteable' );
    }

    public function requestToTeacher()
    {
        return $this->belongsTo('App\Models\RequestToTeacher');
    }


    //================================================================
    // FUNCTIONS
    //================================================================
    public function hasProduct($id , $type = 'Course' ,$_type = 'course')
    {

        $query =  $this->products($type)->where('products_id' , $id->id);
        if($type === 'Course')
        {
            $query->where('type' , $_type);
        }
        return $query;

    }



    //================================================================
    // QUERY SCOPES
    //================================================================
    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', true);
    }

    //================================================================
    // ADMIN-LTE FUNCTIONS
    //================================================================
    public function adminlte_image(): string
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(): string
    {
        return 'Admin';
    }

    public function adminlte_profile_url(): string
    {
        return 'profile/username';
    }
}
