<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
            return view('store.index');
    }

    public function mensaje(Request $request)
    {
    
        Mail::to('kl98lamas@gmail.com')->send( new ContactanosMailable($request->all()));
        return view('contacto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   
    public function contacto()
    {
    
            return view('contacto');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $categoria = Categoria::all();
        $productos = Producto::paginate(9);
        return view('store.store',compact('productos','categoria'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $producto = Producto::where ('nombre_producto',$slug) ->first();
        return view('store.show',compact('producto'));
    }

    public function filtrar($id){
        $producto = Producto::where('categoria_id',$id)->paginate(10);
        $categoria = Categoria::all();
        return view('store.store',compact('producto','categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
