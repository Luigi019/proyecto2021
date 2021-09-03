<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Enterprise;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $enterprise = Enterprise::all();
        $company = Company::all();
        $news = News::all();
        $user = User::all();
        $role = Role::all();
        return view('panel.home', compact('user', 'gallery', 'enterprise', 'news', 'company', 'role'));
    }
}
