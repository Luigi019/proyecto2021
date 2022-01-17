<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\RequestToTeacher;
use App\Models\User;
use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApproveRequestToTeacher;
use App\Notifications\DeclineRequestToTeacher;

class RequestToTeacherController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = requestToTeacher::orderBy('id' , 'desc');

            return $this->datatable($query)
                ->addColumn('actions' ,function($field){
                    $this->data['field']= $field;
                    return $this->loadView('datatable.buttons.approve') . $this->loadView('datatable.buttons.decline');
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        $this->data = [
            'model'=>'RequestToTeacher',
            'page' => [
                'headerTitle' => 'Todas las solicitudes',
                'titlePage' => 'solicitudes',
                'createText' => 'solicitud',
            ],
            'datatable' => [
                'route' => [
                    'getData' => 'list.requestToTeacher',
                    'deleteData' => 'delete.resource'
                ],
            ]
        ];

        $this->builder->columns([
            
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'user_id', 'name' => 'user_id', 'title' => 'user_id'],
            ['data' => 'subject', 'name' => 'subject', 'title' => 'subject'],
            ['data' => 'message', 'name' => 'message', 'title' => 'message'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);
        return $this->loadView('datatable.index');
    }
    public function update(RequestToTeacher $requestToTeacher): RedirectResponse
    {

        $requestToTeacher->user->assignRole(['PROFESOR']);

        flash('Rol asignado correctamente' , 'success');

        $requestToTeacher->user->notify(new ApproveRequestToTeacher("approve"));

        $requestToTeacher->delete();

        return redirect()->route('panel.requestToTeacher.index');
    }
    public function delete(RequestToTeacher $requestToTeacher){
        $requestToTeacher->user->notify(new DeclineRequestToTeacher("decline"));

        $requestToTeacher->delete();
        return redirect()->route('panel.requestToTeacher.index'); 
    }
}
