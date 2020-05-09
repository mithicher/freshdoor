<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;
use App\Otp;

class Step1 extends Component
{
    public $name;
    public $email;
    public $password;
    // public $password_confirmation;
    
    public function mount()
    {
        $this->name = session('name', '');
        $this->email = session('email', '');
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->getRules());
    }

    public function submit() 
    {
        $data = $this->validate($this->getRules());

        // Save data in session
        session()->put($data);

        $token = Otp::create([
            'active' => true
        ]);

        if ($token->sendCode(session('email'))) {
            session()->put("token_id", $token->id);
            $this->emit('next');
        } else {
            // delete token because it can't be sent
            $token->delete();
            session()->flash('error', "Unable to send verification code");
            return redirect()->back();
        }
    }

    public function getRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            // 'password_confirmation' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.registration.step1');
    }
}
