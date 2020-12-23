<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{

    public function _construct()
    {

    }

    public function show()
    {
        //$cart = \Session::get('cart');
        $cart = \Cart::getContent();
        $totalQuantity = \Cart::getTotalQuantity();
        $total = $this->total();
        return view('store.cart',compact('cart','total', 'totalQuantity'));
    }

    public function add(Producto $producto)
    {
        // $cart = \Session::get('cart');
        // $producto->quantity = 1;
        // $cart[$producto->nombre_producto] = $producto;
        // \Session::put('cart',$cart);
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
        // $cart = \Session::get('cart');
        // unset($cart[$producto->nombre_producto]);
        // \Session::put('cart',$cart);
        \Cart::remove($id);
        return redirect()->route('cart-show');
    }

    public function update($id)
    {
        // $cart = \Session::get('cart');
        // $cart[$producto]->quantity = $quantity;
        // \Session::put('cart',$cart);
        $producto = Producto::find($id);
        \Cart::update($producto->id, array(
            'quantity' => 1,
        ));
        return redirect()->route('cart-show');
    }

    public function trash(){
        // \Session::forget('cart');
        // \Session::put('cart',array());
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