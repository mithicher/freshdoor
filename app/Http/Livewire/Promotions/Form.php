<?php

namespace App\Http\Livewire\Promotions;

use Livewire\Component;
use App\Promotion;

class Form extends Component
{
    public $description;
    public $link;

    public function updated($field)
    {
        $this->validateOnly($field, $this->getRules());
    }
    
    public function submit()
    {
        $data = $this->validate($this->getRules());

        Promotion::create($data);

        $this->reset();

        session()->flash('message', 'Promotion created');
        return redirect()->back();
    }

    public function getRules()
    {
        return [
            'description' => ['required'],
            'link' => ['required', 'url'],
        ];
    }

    public function render()
    {
        return view('livewire.promotions.form');
    }
}
