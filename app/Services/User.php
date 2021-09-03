<?php

namespace App\Services;

use App\Models\User;
use Flobbos\Crudable\Contracts\Crud;
use Flobbos\Crudable;

class User implements Crud {
    
    use Crudable\Crudable;
    
    public function __construct(User $user) {
        $this->model = $user;
    }
    
}
