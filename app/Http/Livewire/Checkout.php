<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Facades\Cart as CartFacade;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $step;
   
    protected $listeners = [
        'nextStep' => 'goToNextStep'
        // 'initStripe' => '$refresh'
    ];

    public function mount()
    {
        $this->checkCartTotal();
        $this->step = 1;
    }

    public function complete()
    {
        // dd( session('paymentType') );
        // dd(CartFacade::get() + [
        //     'address' => session('address', ''),
        //     'pincode' => session('pincode', ''),
        //     'city' => session('city', ''),
        //     'paymentType' => session('paymentType', '')
        // ]);

        // @todo Save in orders table
        // generate unique orderno
        // after saving clear cart data from session
        // optional for shipping address and payment type
    }

    public function saveOrder()
    {

    }

    public function goToNextStep()
    {
        $this->step++;

        if ($this->step == 2) {
            // $this->emit('callStripe');
        }
    }

    public function goToPreviousStep()
    {
        $this->step--;
    }

    public function checkCartTotal()
    {
        if (count(CartFacade::get()['products']) < 1) {
            return redirect()->to('/products');
        } 
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
