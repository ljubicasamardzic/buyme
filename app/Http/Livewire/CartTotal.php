<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTotal extends Component
{
    protected $listeners = ['cart_refreshed' => 'render'];

    public function render()
    {
        $total = Cart::total(2);
        $subtotal = Cart::subtotal(2);
        $tax = Cart::tax(2);

        return view('livewire.cart-total', compact('total', 'subtotal', 'tax'));
    }

    public function goToCheckout()
    {
        return redirect()->route('cart.checkout');
    }
}
