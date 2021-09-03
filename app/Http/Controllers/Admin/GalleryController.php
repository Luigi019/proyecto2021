<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

/**
 * Class GalleryController
 * @package App\Http\Controllers
 */
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::paginate();

        return view('panel.gallery.index', compact('galleries'))
            ->with('i', (request()->input('page', 1) - 1) * $galleries->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = new Gallery();
        return view('panel.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Gallery::$rules);

        $gallery = Gallery::create($request->all());
       
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('gallery' , 'public');
    
            $gallery->files()->create([
                'file'=>'storage/'.$move,
                'type'=>'gallery',
            ]);

            
        }
     
        return redirect()->route('admin.galleries.index')
            ->with('success', 'Imagen de la Galería guardada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);

        return view('panel.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);

        return view('panel.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        request()->validate(Gallery::$rules);

        $gallery->update($request->all());
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('gallery' , 'public');
    
            $gallery->files()->update([
                'file'=>'storage/'.$move,
                'type'=>'gallery',
            ]);

            
        }
        return redirect()->route('admin.galleries.index')
            ->with('success', 'Imagen de la Galería actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id)->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Imagen de la Galería eliminada satisfactoriamente');
    }
}
