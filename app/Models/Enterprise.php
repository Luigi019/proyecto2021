<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class Enterprise
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enterprise extends Model
{
  use BaseModel;
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

    public function files()
    {
        return $this->morphMany('App\Models\Files' , 'files');
    }

   

}
