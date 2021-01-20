<?php

use App\Models\Promotor;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Rutas publicas
    //Route::bind('producto', funtion($slug){
    //    return Producto::where('slug', $slug)->first();
    //});

Route::get('prueba/holi', function () {
    $promotor = Promotor::first();

    $promotor->pedidos()->attach(['3', '4', '5', '7']);

    return $promotor->pedidos;
});

Route::group([
    'namespace' => 'App\Http\Controllers'
], function(){
    Route::get('/', 'StoreController@index')->name('store.index');
    Route::get('store', 'StoreController@store')->name('store');
    Route::get('store/{id}', 'StoreController@filtrar')->name('store-filtrado');
    Route::get('producto/{slug}', 'StoreController@show')->name('producto-detail');
    Route::get('cart/show', 'CartController@show')->name('cart-show');
    Route::get('cart/add/{producto}', 'CartController@add')->name('cart-add');
    Route::get('cart/delete/{id}', 'CartController@delete')->name('cart-delete');
    Route::get('cart/trash', 'CartController@trash')->name('cart-trash');
    Route::get('cart/update/{id}', 'CartController@update')->name('cart-update');

});



// Rutas de administracion
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'auth'
], function(){
    Route::resource('/proveedor', 'ProveedorController');
    Route::resource('/categoria', 'CategoriaController');
    //Route::resource('/usuario', 'UsuarioController');
    Route::resource('/compra', 'CompraController');
    Route::resource('/promotor', 'PromotorController');
    Route::get('/promotor/venta/{promotor}', 'PromotorController@showVenta')->name('promotor.showVenta');
    Route::resource('/venta', 'VentaController');
    Route::resource('/producto', 'ProductoController');
    Route::resource('/pedido', 'PedidoController');
    Route::resource('/detalleCompra', 'DetalleCompraController');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
