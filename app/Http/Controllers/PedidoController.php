<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
   
    public function index()
    {
        return view('pedido.index',[
            'pedidos'=>Pedido::all()
        ]);
    }

   
    public function create()
    {
        return view('pedido.create');
    }

   
    public function store(Request $request)
    {
        $pedido=new Pedido();
        $pedido->fecha_entrega=$request->fecha_entrega;
        $pedido->fecha_devolucion=$request->fecha_devolucion;
        $pedido->total_cantidad_retenida=$request->total_cantidad_retenida;
        $pedido->total_cantidad_devuelta=$request->total_cantidad_devuelta;
        $pedido->estado_p=$request->estado_p;
        $pedido->save();
        return redirect()->route('pedido.index');
    }

  
    public function show(Pedido $pedido)
    {
        //
    }

  
    public function edit(Pedido $pedido)
    {
        return view('pedido.edit',[
            'pedido'=>$pedido
        ]);
    }

 
    public function update(Request $request, Pedido $pedido)
    {
  
        $pedido->fecha_entrega=$request->fecha_entrega;
        $pedido->fecha_devolucion=$request->fecha_devolucion;
        $pedido->total_cantidad_retenida=$request->total_cantidad_retenida;
        $pedido->total_cantidad_devuelta=$request->total_cantidad_devuelta;
        $pedido->estado_p=$request->estado_p;
        $pedido->update();
        return redirect()->route('pedido.index');
    }


    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedido.index');
    }
}
