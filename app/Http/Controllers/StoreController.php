<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.index',[
            'store'=>Store::all(),
            'productos' => Producto::paginate(20),
            ]);
    }

    public function store()
    {
        $categoria = Categoria::all();
        $productos = Producto::paginate(5);
        return view('store.store',compact('productos','categoria'));
    }

    public function show($slug)
    {
        $productos = Producto::where ('slug',$slug) ->first();
        return view('store.show',compact('productos'));
    }

    public function filtrar($id){
        $producto = Producto::where('categoria_id',$id)->paginate(6);
        $categoria = Categoria::all();
        return view('store.store',compact('producto','categoria'));
    }


}
