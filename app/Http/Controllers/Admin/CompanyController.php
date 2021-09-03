<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate();

        return view('panel.company.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * $companies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('panel.company.create', compact('company'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Company::$rules);

        $company = Company::create($request->all());
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('company' , 'public');
    
            $company->files()->create([
                'file'=>'storage/'.$move,
                'type'=>'company',
            ]);

            
        }
        return redirect()->route('admin.companies.index')
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
        $company = Company::find($id);

        return view('panel.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('panel.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        request()->validate(Company::$rules);

        $company->update($request->all());
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo')[0];
    
            $move = $file->store('company' , 'public');
    
            $company->files()->update([
                'file'=>'storage/'.$move,
                'type'=>'company',
            ]);

            
        }
        return redirect()->route('admin.companies.index')
            ->with('success', 'Información actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('admin.companies.index')
            ->with('success', 'Información eliminada satisfactoriamente');
    }
}
