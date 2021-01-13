<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compra.index',[ 
            'compras'=>Compra::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.create' , [
            'proveedors'=>Proveedor::all(),
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
        $compra = new Compra();
        $compra->cantidad_compra = $request->cantidad_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->costo_importacion_total = $request->costo_importacion_total;
        $compra->SubTotal = $request->SubTotal;
        $compra->total_compra = $request->total_compra;
        $compra->save();

        
        $producto = Producto::find($request->producto_id);
        
        $producto->stock_producto += $compra->cantidad_compra;
        $producto->saveOrFail();





        return redirect()->route('compra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        return view('compra.edit',[
            'proveedor'=>Proveedor::all(),
            'compra'=>$compra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        $compra->cantidad_compra = $request->cantidad_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->costo_importacion_total = $request->costo_importacion_total;
        $compra->SubTotal = $request->SubTotal;
        $compra->total_compra = $request->total_compra;
        $compra->update();
        return redirect()->route('compra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compra.index');
    }
}
