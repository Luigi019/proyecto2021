<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Enterprise;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Retornar las vista welcome
     * Return to welcome view
     *  @param void
     *  @return Application|Factory|View
     * @var void
     */
    public function index()
    {
        $gallery = Gallery::all();
        $enterprise = Enterprise::all();
        $company = Company::all();


        $news = News::limit(3)->get();
        return view('welcome', compact('gallery', 'news', 'enterprise', 'company'));
    }


}
