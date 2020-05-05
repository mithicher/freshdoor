<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart as CartFacade;

class Cart extends Component
{
    public $cart;
    public $cartTotal;
   
    public function mount()
    {
        $this->cart = CartFacade::get();
        $this->cartTotal = CartFacade::cartTotal();
    }
  
    public function removeFromCart($productId): void
    {
        CartFacade::remove($productId);
        $this->refreshCartData();
        $this->emit('productRemoved');

        session()->flash('message', 'Product removed from cart.');
    }

    public function incrementQuantity($productId)
    {
        CartFacade::incrementQuantity($productId);
        $this->refreshCartData();

        session()->flash('message', 'Product updated.');
    }

    public function decrementQuantity($productId)
    {
        CartFacade::decrementQuantity($productId);
        $this->refreshCartData();

        session()->flash('message', 'Product updated.');
    }

    public function checkout()
    {
        CartFacade::clear();
        $this->emit('clearCart');
        $this->refreshCartData();
        session()->flash('message', 'Cart cleared.');
    }

    public function refreshCartData() {
        $this->cart = CartFacade::get();
        $this->cartTotal = CartFacade::cartTotal();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
