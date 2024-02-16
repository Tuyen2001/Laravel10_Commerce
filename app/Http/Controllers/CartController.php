<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    // Cart laấy từ App\Helper\Cart
    public function index(Cart $cart){
        // $cartItem = $cart->list();
        // dd($cartItem);
        return view ('fe.cart',compact('cart'));
    }

    public function add(Request $request, Cart $cart){
       $product = Product::find($request->id);
       $quantity = $request->quantity;
       $cart->add($product, $quantity);
    //    dd($product);
    //    dd($request->all());
        return redirect()->route('cart.index');
    }
}
