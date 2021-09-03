<?php

namespace App\Services\Admin;

use App\Models\UserController;
use Flobbos\Crudable\Contracts\Crud;
use Flobbos\Crudable;

class UserController implements Crud {
    
    use Crudable\Crudable;
    
    public function __construct(UserController $user_controller) {
        $this->model = $user_controller;
    }
    
}
