<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = 'votes';

    protected $fillable = [
        'ratedIndex',
        'user_id',
        'voteable_type',
        'voteable_id',
    ];


    public function voteable()
    {
        return $this->morphTo();
    }
}
