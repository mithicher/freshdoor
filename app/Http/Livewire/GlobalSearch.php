<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Category;
use App\Product;

class GlobalSearch extends Component
{
    public $search = '';
    public $categorySelect = '';
    public $products = [];

    public function updated()
    {
        $this->products = Product::query()
            ->with('category')
            ->filterByCategory($this->categorySelect)
            ->whereLike(['name', 'price', 'category.name', 'shop.name'], $this->search)
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.global-search', [
            'categories' => Category::all()
        ]);
    }
}