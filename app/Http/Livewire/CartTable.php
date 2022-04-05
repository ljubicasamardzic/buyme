<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $products = Cart::content();

        return view('livewire.cart-table', compact('products'));
    }

    public function removeItem($rowId)
    {
        $product = Cart::get($rowId);

        if ($product) {
            Cart::remove($rowId);
        }

        $this->emit('cart_refreshed');
    }

    public function reduceQuantity($rowId)
    {
        $product = Cart::get($rowId);

        if ($product) {
            if ($product->qty <= 1) {
                $this->removeItem($rowId);
            } else  {
                Cart::update($rowId, $product->qty - 1);
            }
        }

        $this->emit('cart_refreshed');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);

        if ($product) {
            Cart::update($rowId, $product->qty + 1);
        }

        $this->emit('cart_refreshed');
    }
}
