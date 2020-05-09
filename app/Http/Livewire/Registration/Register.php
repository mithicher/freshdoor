<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;

class Register extends Component
{
    public $step;

    protected $listeners = [
        'next',
        'previous'
    ];

    public function mount()
    {
        $this->step = 1;
    }

    public function next()
    {
        $this->step++;
    }

    public function previous()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.registration.register');
    }
}
