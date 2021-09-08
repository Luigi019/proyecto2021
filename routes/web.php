<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\docsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\chatController;

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

Route::get('/home', homeController::class);

Route::get('visitantes/', [visitorController::class, 'visitor']);

Route::get('documentos', [docsController::class, 'index']);

Route::get('documentos/upload', [docsController::class, 'upload']);

Route::get('documentos/{oficina}/{doc?}', [docsController::class, 'getDocs']);

Route::get('usuarios/', [usersController::class, 'users']);

Route::get('blog/', [blogController::class, 'blog']);

Route::get('chat/', [chatController::class, 'chat']);
