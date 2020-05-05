<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart as CartFacade;
use Illuminate\Support\Facades\Http;
use App\Order;
use App\Address;
use Illuminate\Support\Str;

class Payment extends Component
{
    public $paymentType;
   
    protected $listeners = [
        'validateForm' => 'validateData',
        'callStripe' => '$refresh'
    ];

    public function mount()
    {
        $this->paymentType = session('paymentType', 'Online payment');
    }

    public function initStripe()
    {
        if ($this->paymentType === 'Online payment') {
            $this->emit('callStripe');
        }
    }

    public function validateData($step)
    {
        if ($step == 3) {
            $data = $this->validate([
                'paymentType' => 'required'
            ]);
    
            // store in session
            session([
                'paymentType' => $data['paymentType']
            ]);

            if (session('paymentType') === 'Online payment') {
                return redirect()->to('checkout/pay');
            } else {
                $cartProducts = CartFacade::get()['products'];
                $cartTotal = CartFacade::cartTotal();
                $cartDiscount = CartFacade::getDiscount();
                $cartNetTotal = CartFacade::netTotal();

                // Save address also
                if (auth()->user()->hasAddress()) {   
                    $addressFound = Address::findOrFail(session('addressId'));

                    Order::create([
                        'user_id' => auth()->user()->id,
                        'address' => $addressFound->address,
                        'city' => $addressFound->city,
                        'pincode' => $addressFound->pincode,
    
                        'amount' => $cartTotal,
                        'discount_amount' => $cartDiscount,
                        'net_total' => $cartNetTotal,
                        'products' => $cartProducts,
    
                        'payment' => session('paymentType', ''),
                        'payment_id' => Str::random(8)
                    ]);

                    session()->remove('addressId');
                } else {
                    auth()->user()->addresses()->create([
                        'address' => session('address', ''),
                        'city' => session('city', ''),
                        'pincode' => session('pincode', ''),
                        'default' => true
                    ]);

                    Order::create([
                        'user_id' => auth()->user()->id,
                        'address' => session('address', ''),
                        'city' => session('city', ''),
                        'pincode' => session('pincode', ''),
    
                        'amount' => $cartTotal,
                        'discount_amount' => $cartDiscount,
                        'net_total' => $cartNetTotal,
                        'products' => $cartProducts,
    
                        'payment' => session('paymentType', ''),
                        'payment_id' => Str::random(8)
                    ]);

                    session()->remove('address');
                    session()->remove('city');
                    session()->remove('pincode');
                }

                CartFacade::clear();

                return redirect()->to('order-complete');   
            }
        }
    }

    public function render()
    {
        return view('livewire.payment');
    }
}
