<?php

namespace App\Http\Livewire;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductsIndex extends Component
{
    public $products;

    public function mount($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.products-index');
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        Cart::add($product->id, $product->name, 1, $product->formatted_price, 0, ['path' => $product->path]);

        $this->emit('cart_updated');
    }
}
