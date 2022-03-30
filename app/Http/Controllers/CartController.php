<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function show()
    {
        $cart = Cart::content();

        return view('cart.show', compact('cart'));
    }
}
