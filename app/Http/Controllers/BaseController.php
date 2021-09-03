<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    public function destroyFile(Request $request)
    {

        \File::delete($request->key);

        return 1;
    }
}
