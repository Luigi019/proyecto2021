<?php

use App\Http\Controllers\ajaxController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\docsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\chatController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

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

\Auth::routes();

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('news',  [NewsController::class , "index"])->name("news");
Route::get('new/{new}',  [NewsController::class , "detail"])->name("detail");
Route::post("contactar" , [ContactController::class , "sendMail"])->name("sendMail");

//Routes for admin users
Route::group([
    'prefix' =>'admin',
    'as'=>'admin.',
     'middleware'=>'auth' 
] , function($route){
    
    Route::get('/home' , [App\Http\Controllers\Admin\HomeController::class , 'index']);
    Route::resource('/users' , App\Http\Controllers\Admin\UserController::class );
    /*   Route::resource('/news' , App\Http\Controllers\Admin\NewsController::class , ['except'=>['store' , 'destroy']]);
    Route::match(['put' , 'post'],'/news/{news?}' , [App\Http\Controllers\Admin\NewsController::class , 'store'])->name('news.store');
    Route::get('delete/{news}' , [App\Http\Controllers\Admin\NewsController::class , 'destroy'])->name('news.destroy'); */
    Route::post('delete-file' , [App\Http\Controllers\Admin\EnterpriseController::class ,'destroyFile'])->name('delete.img.resource');
   
    Route::resource('/roles' , App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/news' , App\Http\Controllers\Admin\NewsController::class);
    Route::resource('/companies' , App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('/enterprises' , App\Http\Controllers\Admin\EnterpriseController::class);
    Route::resource('/galleries' , App\Http\Controllers\Admin\GalleryController::class);

});
Route::get('/', homeController::class);

Route::get('/home', homeController::class);

Route::get('visitantes/', [visitorController::class, 'visitor']);

Route::get('documentos', [docsController::class, 'index']);

Route::get('documentos/upload', [docsController::class, 'upload']);

Route::post('documentos/getDocs', [docsController::class, 'getDocs']);

Route::get('documentos/{oficina}/{doc?}', [docsController::class, 'getDocs']);

Route::get('usuarios/', [usersController::class, 'users']);

Route::get('blog/', [blogController::class, 'blog']);

Route::get('chat/', [chatController::class, 'chat']);
