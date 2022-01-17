<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, BaseModel;

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'city_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'city_id', 'id');
    }
}
