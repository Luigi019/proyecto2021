<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends BaseController
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = City::orderBy('id' , 'desc');

            return $this->datatable($query)
                ->addColumn('actions' ,function($field){
                    $this->data['field']= $field;
                    return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
                })
                ->rawColumns(['actions'])
                ->toJson();
        }
        //  create array to pass the view
        $this->data = [
            'model'=>'City',
            'page' => [
                'headerTitle' => 'Todas las Ciudades',
                'titlePage' => 'Ciudades',
                'createText' => 'Ciudad',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.cities.create',
                    'editData' => 'panel.cities.edit'
                ],
            ]
        ];
        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Nombre'],
            ['data' => 'country_code', 'name' => 'country_code', 'title' => 'Codigo del país'],
            ['data' => 'longitude', 'name' => 'longitude', 'title' => 'Longitud'],
            ['data' => 'latitude', 'name' => 'latitude', 'title' => 'Latitud'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);
        



        return $this->loadView('datatable.index');
    }

    public function create(City $cities)
    {

        $this->data = [
            'cities'=> new City
        ];

        return $this->loadView('panel.city.create');
    }

    public function store(CityRequest $request)
    {
        $cities = new City;
        $cities->name = $request->name;
        $cities->longitude = $request->longitude;
        $cities->latitude = $request->latitude;
        $cities->country_code = 'ES';

        $cities->save();
        flash('Se ha creado exitosamente' , 'success');
        return back();
    }

    public function edit(City $city)
    {

        $this->data = [
            'page' => [
                'headerTitle' => 'Editar ciudad',
                'titlePage' => 'Ciudades'
            ],
            'city' => $city,
            'route'=>[
                'updateData'=>[
                    'param'=>'city',
                    'name'=>'panel.cities.update'
                ]
            ]

        ];

        return $this->loadView('panel.city.edit' );
    }
    public function update(Request $request, City $city)
    {

        $city->name = $request->name;
        $city->longitude = $request->longitude;
        $city->latitude = $request->latitude;

        $city->update();

        flash('Ciudad editada correctamente', 'success');
        $this->data['city'] = $city;
        return $this->redirectRoute('panel.cities.edit');
    }

}
