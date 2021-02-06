<?php

use App\Models\Promotor;
use Illuminate\Support\Facades\Route;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
Auth::routes();

// Rutas publicas
    //Route::bind('producto', funtion($slug){
    //    return Producto::where('slug', $slug)->first();
    //});



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
    Route::get('contacto', 'StoreController@contacto')->name('contacto');
    Route::post('mensaje', 'StoreController@mensaje')->name('mensaje');
  
});



// Rutas de administracion
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'auth'
], function(){
    
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('/proveedor', 'ProveedorController');
    Route::resource('/categoria', 'CategoriaController');
    //Route::resource('/usuario', 'UsuarioController');
    Route::resource('/compra', 'CompraController');
    Route::resource('/promotor', 'PromotorController');
    Route::get('/promotor/show/{promotor}', 'PromotorController@verpromotor')->name('ver.promotor');
    Route::get('/promotor/venta/{promotor}', 'PromotorController@showVenta')->name('promotor.showVenta');
    Route::get('/venta/producto/{id}', 'VentaController@ventaProducto')->name('venta.productos');
    Route::resource('/venta', 'VentaController');
    Route::resource('/producto', 'ProductoController');
    Route::resource('/pedido', 'PedidoController');
    Route::resource('/detalleCompra', 'DetalleCompraController');
    Route::get('/reporte', 'ReporteController@index')->name('reporte.index');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
