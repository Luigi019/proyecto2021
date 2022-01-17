<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'model'=>'Page',
            'page' => [
                'headerTitle' => 'Todas las páginas',
                'titlePage' => 'páginas',
                'createText' => 'Paginas',
            ],
            'datatable' => [
                'route' => [
                    'getData' => 'list.pages',
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.pages.create',
                    'editData' => 'panel.pages.edit'
                ],
            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'page', 'name' => 'page', 'title' => 'page'],
            ['data' => 'titlePage', 'name' => 'titlePage', 'title' => 'titlePage'],
            ['data' => 'slug', 'name' => 'slug', 'title' => 'slug'],
            ['data' => 'description', 'name' => 'description', 'title' => 'description'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

        if(request()->ajax())
        {
            $query = Page::orderBy('id' , 'desc');

            return $this->datatable($query)
            ->addColumn('actions' ,function($field){
                $this->data['field']= $field;
                 return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
             })
            ->rawColumns(['actions'])
            ->toJson();
        }

        return $this->loadView('datatable.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data = [
            'page' => [
                'headerTitle' => 'Agregar página',
                'titlePage' => 'página'
            ],
            'route'=>[
                'storeData'=>'panel.pages.store'
            ],
            'page' => new Page(),

        ];
        return $this->loadView('panel.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataPage=$request->except("_token");

        Page::create([
            $dataPage,
            'slug' =>  $request->page,
            'page' => $request->page,
            'titlePage' => $request->titlePage,
            'description' => $request->description,

        ]);

        flash('Página creada exitosamente', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->data = [
            'page' => [
                'headerTitle' => 'Editar página',
                'titlePage' => 'páginas'
            ],
            'page' => $page,
            'route'=>[
                'updateData'=>[
                    'param'=>'page',
                    'name'=>'panel.pages.update'
                ]
            ]

        ];
        return $this->loadView('panel.pages.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'page'=>['required'],
            'titlePage'=>['required'],
            'description'=>['required'],
        ]);
        $dataPage=$request->except("_token");
        $page->page = $request->page;
        $page->slug = $request->page;
        $page->titlePage = $request->titlePage;
        $page->description = $request->description;

        $page->update();
        flash('Página editada correctamente', 'success');
        $this->data['page'] = $page;
        return $this->redirectRoute('panel.pages.edit');
    }
}
