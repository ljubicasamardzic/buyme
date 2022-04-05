<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        $user = User::find(1);
        $paymentIntent = $user->createSetupIntent();

        return view('cart.checkout', compact('cart', 'paymentIntent', 'user'));
    }

    public function pay(Request $request)
    {
        dd($request);
    }
}
