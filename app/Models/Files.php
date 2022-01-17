<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = ['type' , 'file' , 'files_id' , 'files_type', 'title' ];

    public function files()
    {
        return $this->morphTo();
    }

    // public function scopePhoto($query)
    // {
    //    return $query->where('type' , 'photo');
    // }

}
