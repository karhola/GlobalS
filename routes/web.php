<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'auth'
], function(){

     Route::resource('/proveedor', 'ProveedorController');
     Route::resource('/categoria', 'CategoriaController');
     Route::resource('/usuario', 'UsuarioController');   
     Route::resource('/compra', 'CompraController');  
     Route::resource('/promotor', 'PromotorController');  
     Route::resource('/venta', 'VentaController');  

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
