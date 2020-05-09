<?php

namespace App\Http\Livewire;

use App\Product;
use App\Category;
use App\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $updatesQueryString = ['search', 'category', 'price'];

    public $search;
    public $category = [];
    public $price = [];

    public function mount()
    {
        $this->search = request('search', '');
        $this->category = request('category') ?? [];
    }

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
            'products' => Product::query()
                ->with(['shop', 'category'])
                ->filterByCategory($this->category)
                ->whereLike(['name', 'price', 'category.name', 'shop.name'], $this->search)
                ->latest('id')
                ->paginate(12)
                ->withPath('/products'),
            'categories' => Category::select('name', 'slug')->get()
        ]);
    }
}
