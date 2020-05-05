<?php

namespace App\Http\Livewire;

use App\Product;
use App\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    // protected $updatesQueryString = ['search'];

    public function addToCart($productId, $quantity)
    {
        $product = Product::where('id', $productId)->select('id', 'name', 'price')->first();

        $products = Cart::get()['products'];

        $productIsAvailable = collect($products)->contains('id', $product->id);

        if ($productIsAvailable == true) {
            Cart::incrementQuantity($product->id);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity ?? 1,
                'attributes' => []
            ]);
        }

        $this->emit('productAdded');
    }

    public function render()
    {
        return view('livewire.products', [
            'products' => Product::paginate(12)->withPath('/products')
        ]);
    }
}
