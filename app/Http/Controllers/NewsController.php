<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        \Meta::set('description', 'Todas las noticias');
        \Meta::set('description', 'All news');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        $news = News::paginate(9);
        return view('new',  compact('news'));
    }
    public function detail($id)
    {
        $new = News::find($id);
        \Meta::set('title', $new->title );
        \Meta::set('description', $new->description);

        $news = News::paginate(3);
        return view('detailNew',  compact('new', 'news'));
    }
}
