<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Categoria::all();
        return view('categoria.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = new Categoria();
        $datos->nombre_categoria =$request->nombre_cate;
  
        $datos->save();
      
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=Categoria::findOrFail($id);
        
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre_categoria =$request->nombre_cate;
  
        $categoria->update();
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
