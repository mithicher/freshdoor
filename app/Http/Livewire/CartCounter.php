<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    public $cartTotal = 0;
     
    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function updateCartTotal()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
