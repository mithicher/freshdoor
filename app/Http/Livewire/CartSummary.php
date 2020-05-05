<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart as CartFacade;
use App\Address;

class CartSummary extends Component
{
    public $cart;
    public $discount = '';
    public $discountAmount = 0;
    public $cartTotal = 0;
    public $netTotal = 0;

    public $address;
    public $pincode;
    public $city;
    public $paymentType;

    protected $listeners = [
        'productRemoved' => 'checkCartTotal',
        'validateForm' => 'validateData'
    ];
    
    public function mount()
    {
        $this->checkCartTotal();

        $this->refreshCartData();

        if (auth()->user()->hasAddress()) {
            $address = Address::findOrFail(session('addressId'));
            $this->address = $address->address;
            $this->pincode = $address->pincode;
            $this->city = $address->city;
        } else {
            $this->address = session('address', '');
            $this->pincode = session('pincode', '');
            $this->city = session('city', '');
        }
    }

    public function validateData($step)
    {
        $this->emit('nextStep');
    }

    public function addDiscount()
    {
        if ($this->discount == 'HELLO123') {
            
            sleep(3);

            // $this->discountAmount = 100;
            // $this->cartTotal = $this->cartTotal - $this->discountAmount;
            CartFacade::addDiscount(100);

            $this->refreshCartData();

            $this->emit('couponApplied');
        } 

        $this->discount = '';
    }

    public function removeFromCart($productId): void
    {
        CartFacade::remove($productId);
        $this->refreshCartData();
        $this->emit('productRemoved');
    }

    public function removeDiscount()
    {
        CartFacade::removeDiscount();
        $this->refreshCartData();
        $this->emit('discountRemoved');
    }

    public function checkCartTotal()
    {
        if (count(CartFacade::get()['products']) < 1) {
            return redirect()->to('/products');
        } 
    }

    public function refreshCartData() {
        $this->cart = CartFacade::get();
        $this->cartTotal = CartFacade::cartTotal();
        $this->discountAmount = CartFacade::getDiscount();
        $this->netTotal = CartFacade::netTotal();
    }

    public function render()
    {
        return view('livewire.cart-summary');
    }
}
