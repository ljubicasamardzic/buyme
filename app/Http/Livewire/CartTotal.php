<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTotal extends Component
{
    protected $listeners = ['cart_refreshed' => 'render', 'item_removed' => 'mount'];
    public $isEmpty = false;

    public function mount()
    {
        if (Cart::count() == 0) {
            $this->isEmpty = true;
        }
    }

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
