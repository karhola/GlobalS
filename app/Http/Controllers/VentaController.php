<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Promotor;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index',[
            'ventas'=>Venta::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.create',[
            'promotors'=>Promotor::all()
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
        $venta=new Venta();
        $venta->fecha_venta =$request->fecha_venta;
        $venta->cantidad =$request->cantidad;
        $venta->precio_unitario =$request->precio_unitario;
        $venta->total_venta =$request->total_venta;
        $venta->promotor_id =$request->promotor_id;
      
        $venta->save();
      
        return redirect()->route('venta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('venta.edit',[
            'promotors'=>Promotor::all(),
            'venta'=>Venta::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venta=Venta::find($id);
        $venta->fecha_venta =$request->fecha_venta;
        $venta->cantidad =$request->cantidad;
        $venta->precio_unitario =$request->precio_unitario;
        $venta->total_venta =$request->total_venta;
        $venta->promotor_id =$request->promotor_id;
      
        $venta->update();
      
        return redirect()->route('venta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=Venta::find($id);
        $venta->delete();
        return redirect()->route('venta.index');
    }
}
