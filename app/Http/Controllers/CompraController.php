<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
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


    public function create()
    {
        return view('compra.create', [ 'proveedors'=> Proveedor::all(),  'productos' => Producto::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rquest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = explode(',', $request->productos[0]);
        $cantidadProductos = explode(',', $request->cantidadProducto[0]);
        $subtotalProductos = explode(',', $request->subtotalProducto[0]);
        $importacionProductos = explode(',', $request->importacionProducto[0]);
        $productoLista = [];
        for ($i = 0 ; $i < count($productos) ; $i++){
            $productoLista = $productoLista + [
                $productos[$i] => [
                    'cantidad' => $cantidadProductos[$i],
                    'subtotal' => $subtotalProductos[$i],
                    'coste_importacion' => $importacionProductos[$i],
                ],
            ];
        }
        $compra = new Compra();
        $compra->cantidad_compra = $request->cantidad_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->costo_importacion_total = $request->costo_importacion_total;
        $compra->total_compra = $request->total_compra;
        $compra->proveedor_id = $request->proveedor_id;
        $compra->save();
        $compra->productos()->attach($productoLista);

        return redirect()->route('compra.index');
    }

    public function show(Compra $compra)
    {
        return view('compra.show',[
            'compra' => $compra,
            'productos' => $compra->productos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {

        $this->authorize('update', $compra );

        return view('compra.edit',[
            'compra'=>$compra
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
        $compra->fecha_compra = $request->fecha_compra;
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
