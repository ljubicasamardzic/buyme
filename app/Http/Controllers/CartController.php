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

    public function checkout()
    {
        $cart = Cart::content();
        $user = auth()->user();
        $paymentIntent = $user->createSetupIntent();

        return view('cart.checkout', compact('cart', 'paymentIntent', 'user'));
    }
}
