<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Promotor;
use Illuminate\Http\Request;

class VentaController extends Controller
{

    public function index()
    {
        return view('venta.index',[
            'ventas'=>Venta::all()
        ]);
    }

    public function create()
    {
        return view('venta.create',[
            'promotors'=> Promotor::all(),
            'productos' => Producto::all()
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
        $array = explode(',', $request->productos[0]);
        $venta = new Venta();
        $venta->cantidad_v = $request->cantidad_v;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->total_venta = $request->total_venta;
        $venta->beneficio_total_promotor = $request->beneficio_promotor;
        $venta->beneficio_total_oficina = $request->beneficio_oficina;
        $venta->promotor_id = $request->promotor_id;
        $venta->save();

        $ventaProductos = Venta::all()->last();
        $ventaProductos->productos()->attach($array, [
            
            'cantidad' => 23,
            'subtotal' => 46,
            'beneficio_subtotal_promotor' => '23',
            'beneficio_subtotal_oficina' => '89',
        ]);
        return redirect()->route('venta.index');
    }

    public function edit($id)
    {
        return view('venta.edit',[
            'promotors'=>Promotor::all(),
            'venta'=>Venta::find($id)
        ]);
    }


    public function show()
    {
        $cart = \Cart::getContent();
        $totalQuantity = \Cart::getTotalQuantity();
        $total = $this->total();
        return view('store.cart',compact('cart','total', 'totalQuantity'));
    }

    public function add(Producto $producto)
    {
        \Cart::add(array(
            'id' => $producto->id,
            'name' => $producto->nombre_producto,
            'price' => $producto->pventa_producto,
            'quantity' => 1,
            'attributes' => $producto
        ));
        return redirect()->route('cart-show');
    }

    public function delete($id)
    {
        \Cart::remove($id);
        return redirect()->route('cart-show');
    }

    public function update($id)
    {
        $producto = Producto::find($id);
        \Cart::update($producto->id, array(
            'quantity' => 1,
        ));
        return redirect()->route('cart-show');
    }

    public function trash(){
        \Cart::clear();
        return redirect()->route('cart-show');
    }

    public function total(){
        $total = \Cart::getTotal();
        return $total;
    }

    public function orderDetail()
    {
        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('store.order-detail', compact('cart', 'total'));
    }
}

