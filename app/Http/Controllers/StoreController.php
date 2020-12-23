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
            ]);
    }

    public function store()
    {
        $categoria = Categoria::all();
        $producto = Producto::paginate(5);
        return view('store.store',compact('producto','categoria'));
    }

    public function show($slug)
    {
        $producto = Producto::where ('slug',$slug) ->first();
        return view('store.show',compact('producto'));
    }

    public function filtrar($id){
        $producto = Producto::where('categoria_id',$id)->paginate(6);
        $categoria = Categoria::all();
        return view('store.store',compact('producto','categoria'));
    }


}
