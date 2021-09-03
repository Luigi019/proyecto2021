<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    
    use HasFactory;

    protected $fillable = ['files_id' , 'files_type' , 'file' , 'type'];

    public function files()
    {
        return $this->morphTo();
    }
}
