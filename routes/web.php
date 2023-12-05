<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']], function(){
    
    Route::get('/categorias', [CategoriaController::class, "index"]);
    Route::post('/categorias', [CategoriaController::class, "store"]);
    Route::get('/categorias/edit/{id}', [CategoriaController::class, "edit"]);
    Route::put('/categorias/edit/{id}', [CategoriaController::class, "putEdit"]);
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::resource('/categorias',CategoriaController::class);
    
    Route::get('/productos', [ProductoController::class, "index"]);
    Route::post('/productos', [ProductoController::class, "store"]);
    Route::get('/productos/editp/{id}', [ProductoController::class, "edit"]);
    Route::put('/productos/editp/{id}', [ProductoController::class, "putEdit"]);
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::resource('/productos',ProductoController::class);
    
    Route::get('/salidas', [VentaController::class, "index"]);
    Route::post('/salidas', [VentaController::class, "store"]);
    Route::resource('/salidas',VentaController::class);
    // Route::group(['middleware' => ['role:admin']], function () {
        
    // });
    Route::resource('permission',PermissionController::class);
    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
