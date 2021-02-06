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

        $this->authorize('view', new Categoria() );

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
        $this->authorize('create', new Categoria());

        return view('categoria.create');
    }

    public function store(Request $request)
    {

        $this->authorize('update', new Categoria());

        $datos = new Categoria();
        $datos->nombre_categoria =$request->nombre_cate;
        $datos->save();

        return redirect()->route('categoria.index');
    }

    public function show($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('categoria.show', compact('categoria'));
    }

    public function edit($id)
    {

        $this->authorize('update', new Categoria());

        $categoria=Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request,$id)
    {

        $this->authorize('update', new Categoria());

        $categoria=Categoria::findOrFail($id);
        $categoria->nombre_categoria =$request->nombre_cate;
        $categoria->update();
        return redirect()->route('categoria.index');
    }

    public function destroy($id)
    {

        $this->authorize('delete', new Categoria());

        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
