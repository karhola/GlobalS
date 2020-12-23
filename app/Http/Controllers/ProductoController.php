<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producto.index',[
            'productos'=>Producto::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create' ,[
            'categorias'=>Categoria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
       
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->pcompra_producto = $request->pcompra_producto;
        $producto->pventa_producto = $request->pventa_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->categoria_id = $request->categoria_id;
 
        if($request->hasFile('pfoto')){
            $file = $request->pfoto;
            $file->move(public_path(). '/imagenes', $file->getClientOriginalName());
            $producto->pfoto = $file->getClientOriginalName();
        }
 
        $producto->save();
 
        return redirect()->route('producto.index');
 
       /* $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->pcompra_producto = $request->pcompra_producto;
        $producto->pventa_producto = $request->pventa_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        return redirect()->route('producto.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit',[
            'categorias'=>Categoria::all(),
            'producto'=>$producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->pcompra_producto = $request->pcompra_producto;
        $producto->pventa_producto = $request->pventa_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->categoria_id = $request->categoria_id;

        if($request->hasFile('pfoto')){
            $file = $request->pfoto;
            $file->move(public_path(). '/imagenes', $file->getClientOriginalName());
            $producto->pfoto = $file->getClientOriginalName();
        }

        $producto->update();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
