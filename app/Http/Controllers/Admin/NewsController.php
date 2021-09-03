<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate();

        return view('panel.news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * $news->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = new News();
        return view('panel.news.create', compact('news'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(News::$rules);

        $news = News::create($request->all());
        if($request->hasFile('photo'))
        {
          
            $file = $request->file('photo')[0];
    
            $move = $file->store('new' , 'public');
    
            $news->files()->create([
                'file'=>'storage/'.$move,
                'type'=>'new',
            ]);

      
        }


        return redirect()->route('admin.news.index')
            ->with('success', 'Noticia guardada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('panel.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('panel.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        request()->validate(News::$rules);

        $news->update($request->all());
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('new' , 'public');
    
            $news->files()->update([
                'file'=>'storage/'.$move,
                'type'=>'new',
            ]);

            
        }
        return redirect()->route('admin.news.index')
            ->with('success', 'Noticia actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $news = News::find($id)->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Noticia eliminada satisfactoriamente');
    }
}
