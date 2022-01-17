<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();

    return view('layouts.app', compact('pages'));
    }
    public function detail($id){

    
    $page = Page::findOrFail($id);
    $pages = Page::all();

    return view('pages.page', compact('page', 'pages'));
}
}
