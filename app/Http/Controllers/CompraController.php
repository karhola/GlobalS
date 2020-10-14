<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Proveedor;

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
        return view('compra.create',[ 
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
        $compra->precio_compra = $request->precio_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->total_compra = $request->total_compra;
        $compra->proveedor_id = $request->proveedor_id;
        $compra->save();
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
            'proveedors'=>Proveedor::all(),
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
        $compra->precio_compra = $request->precio_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->total_compra = $request->total_compra;
        $compra->proveedor_id = $request->proveedor_id;
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
