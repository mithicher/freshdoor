<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Shipping extends Component
{
    public $address;
    public $pincode;
    public $city;

    public $defaultAddressId;
    public $addressId;

    protected $listeners = [
        'validateForm' => 'validateData'
    ];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'address' => 'required',
            'pincode' => 'required',
            'city' => 'required'
        ]);
    }

    public function saveAddress()
    {
        $data = $this->validate([
            'address' => 'required',
            'pincode' => 'required',
            'city' => 'required'
        ], [
            'address.required' => 'Address is required',
            'pincode.required' => 'Pincode is required',
            'city.required' => 'City is required',
        ]);

        // save address in database
        auth()->user()->addresses()->create([
            'address' => $data['address'],
            'pincode' => $data['pincode'],
            'city' => $data['city']
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function validateData($step)
    {
        if ($step == 1) {
            if (auth()->user()->hasAddress() == true) {
                session(['addressId' => $this->addressId]);
                // dd($this->addressId);
            } else {
                $data = $this->validate([
                    'address' => 'required',
                    'pincode' => 'required',
                    'city' => 'required'
                ], [
                    'address.required' => 'Address is required',
                    'pincode.required' => 'Pincode is required',
                    'city.required' => 'City is required',
                ]);

                // store in session
                session([
                    'address' => $data['address'],
                    'pincode' => $data['pincode'],
                    'city' => $data['city'],
                ]);
            }
            
            $this->emit('nextStep');
        }
    }

    public function mount()
    {
        // Get the default address of loggedin user if available
        $defaultAddress = auth()->user()->getDefaultAddress();
        $this->defaultAddressId = $defaultAddress->id ?? null;
        $this->addressId = session('addressId', $defaultAddress->id ?? '');
        
        $this->address = session('address', '');
        $this->pincode = session('pincode', '');
        $this->city = session('city', '');
    }

    public function render()
    {
        return view('livewire.shipping');
    }
}
