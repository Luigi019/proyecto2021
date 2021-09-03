<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
/**
 * Class EnterpriseController
 * @package App\Http\Controllers
 */
class EnterpriseController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprises = Enterprise::paginate();

        return view('panel.enterprise.index', compact('enterprises'))
            ->with('i', (request()->input('page', 1) - 1) * $enterprises->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enterprise = new Enterprise();
        return view('panel.enterprise.create', compact('enterprise'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        request()->validate(Enterprise::$rules);

        $enterprise = Enterprise::create($request->all());

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('enterprise' , 'public');
    
            $enterprise->files()->create([
                'file'=>'storage/'.$move,
                'type'=>'enterprise',
            ]);

            
        }


        return redirect()->route('admin.enterprises.index')
            ->with('success', 'Información guardada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = Enterprise::find($id);

        return view('panel.enterprise.show', compact('enterprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enterprise = Enterprise::find($id);

        return view('panel.enterprise.edit', compact('enterprise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enterprise $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        request()->validate(Enterprise::$rules);

        $enterprise->update($request->all());

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('enterprise' , 'public');
    
            $enterprise->files()->update([
                'file'=>'storage/'.$move,
                'type'=>'enterprise',
            ]);

            
        }

        return redirect()->route('admin.enterprises.index')
            ->with('success', 'Información actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enterprise = Enterprise::find($id)->delete();

        return redirect()->route('admin.enterprises.index')
            ->with('success', 'Información eliminada satisfactoriamente');
    }

    
}
