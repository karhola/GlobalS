<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        return view('producto.index',[
            'productos'=>Producto::all(),
        ]);
    }

    public function apiIndex()
    {
        return Producto::all();
    }

    public function apiShow($id)
    {
        return Producto::findOrFail($id);
    }

    public function create()
    {
        return view('producto.create' ,[
            'categorias'=>Categoria::all(),
        ]);
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->pcompra_producto = $request->pcompra_producto;
        $producto->pventa_producto = $request->pventa_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->fecha_caducidad = $request->fecha_caducidad;
        $producto->beneficio_promotor = $request->beneficio_promotor;
        $producto->beneficio_oficina = $request->beneficio_oficina;
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


    public function edit(Producto $producto)
    {
        return view('producto.edit',[
            'categorias'=>Categoria::all(),
            'producto'=>$producto,
        ]);
    }

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

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }

}
