<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\DownloadInvoice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
    use DownloadInvoice;

    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::orderBy('created_at', 'desc');

            return $this->datatable($query)
                ->addColumn('actions', function ($field) {
                    $this->data['field'] = $field;
                    return $this->loadView('datatable.buttons.pdf');
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        $this->data = [
            'model' => 'Transactions',
            'page' => [
                'headerTitle' => 'Todos las transacciones dela base de datos',
                'titlePage' => 'Transacciones'
            ],
            'datatable' => [
                'route' => []
            ]

        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'description', 'name' => 'description', 'title' => 'descripcion'],
            ['data' => 'price', 'name' => 'price', 'title' => 'precio'],
            ['data' => 'reference', 'name' => 'reference', 'title' => 'referencia'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

        return $this->loadView('datatable.index');
    }
}
