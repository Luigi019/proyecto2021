<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as Roles;

class Role extends Roles
{
    use HasFactory , BaseModel;

    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = \Str::slug($value);
    }
}
