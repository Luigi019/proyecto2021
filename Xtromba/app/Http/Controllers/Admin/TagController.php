<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'model'=>'Tag',
            'page' => [
                'headerTitle' => 'Todas los categorias',
                'titlePage' => 'categorias',
                'createText' => 'categoria',
            ],
            'datatable' => [
                'route' => [
                    'getData' => 'list.tags',
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.tags.create',
                    'editData' => 'panel.tags.edit'
                ],
            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'tag', 'name' => 'tag', 'title' => 'tag'],
            ['data' => 'slug', 'name' => 'slug', 'title' => 'slug'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

        if(request()->ajax())
        {
            $query = Tag::orderBy('id' , 'desc');

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
                'headerTitle' => 'Agregar categoria',
                'titlePage' => 'categorias'
            ],
            'route'=>[
                'storeData'=>'panel.tags.store'
            ],
            'tag' => new Tag(),

        ];
        return $this->loadView('panel.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $dataTag=$request->except("_token");

        Tag::create([
            $dataTag,
            'slug' =>   $request->tag,
            'tag' => $request->tag,
            'active' => $request->active,
        ]);

        flash('Categoria creada exitosamente', 'success');

        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {

        $this->data = [
            'page' => [
                'headerTitle' => 'Editar categoria',
                'titlePage' => 'categorias'
            ],
            'tag' => $tag,
            'route'=>[
                'updateData'=>[
                    'param'=>'tag',
                    'name'=>'panel.tags.update'
                ]
            ]

        ];
        return $this->loadView('panel.tags.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag'=>['required'],
            'active'=>['required'],
        ]);
        $dataTag=$request->except("_token");
        $tag->tag = $request->tag;
        $tag->active = $request->active;
        $tag->slug =   $request->tag;

        $tag->update();
        flash('Categoria editada correctamente', 'success');
        $this->data['tag'] = $tag;
        return $this->redirectRoute('panel.tags.edit');
    }


}
