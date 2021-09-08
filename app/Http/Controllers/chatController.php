<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chatController extends Controller
{
    public function chat(){
        return view('chat');
    }
}
