<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Compra;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('detalleCompra.index',[
            'detalleCompra'=>DetalleCompra::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detalleCompra.create' ,[
            'producto'=>Producto::all(),
            'proveedor'=>Proveedor::all(),
            'compra'=>Compra::all(),
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

        $detalleCompra = new DetalleCompra();
        $detalleCompra->cantidad_compra = $request->cantidad_compra;
        $detalleCompra->total_compra = $request->total_compra;
        $detalleCompra->producto_id = $request->producto_id;
        $detalleCompra->proveedor_id = $request->proveedor_id;
        $detalleCompra->compra_id = $request->compra_id;
        $detalleCompra->save();
        


        $producto = Producto::find($request->producto_id);
        
        $producto->stock_producto += $detalleCompra->cantidad_compra;
        $producto->saveOrFail();
        

        return redirect()->route('detalleCompra.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        return view('detalleCompra.edit',[
            'producto'=>Producto::all(),
            'proveedor'=>Proveedor::all(),
            'compra'=>Compra::all(),
            'detalleCompra'=>$detalleCompra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        $detalleCompra->cantidad_compra = $request->cantidad_compra;
        $detalleCompra->total_compra = $request->total_compra;
        $detalleCompra->producto_id = $request->producto_id;
        $detalleCompra->proveedor_id = $request->proveedor_id;
        $detalleCompra->compra_id = $request->compra_id;
        $detalleCompra->update();
        return redirect()->route('detalleCompra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleCompra $detalleCompra)
    {
        $detalleCompra->delete();
        return redirect()->route('detalleCompra.index');
    }
}
