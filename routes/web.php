<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\docsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', homeController::class);
Route::get ('visitantes', function() {
    return view('visitantes');
});
Route::get('documentos', [docsController::class, 'index']);

Route::get('documentos/upload', [docsController::class, 'upload']);

Route::get('documentos/{oficina}', [docsController::class, 'show']);

Route::get('documentos/{oficina}/{doc?}', function ($oficina, $doc = null){
    if (!$doc){
        return "Documentos de la oficina: $oficina";
    }else{
        return "Documento: $doc, de la oficina: $oficina";
    }
});