<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render', 'cart_refreshed' => 'render'];

    public function render()
    {
        $cartCounter = Cart::count();

        return view('livewire.cart-counter', compact('cartCounter'));
    }

    public function redirectToShow()
    {
        return redirect()->route('cart.show');
    }
}
