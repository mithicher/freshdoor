<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;
use App\Otp;
use App\User;

class Step2 extends Component
{   
    public $code;

    public function mount()
    {
        if (! session()->has("token_id")) {
            return $this->previousStep();
        }   
    }

    public function previousStep()
    {
        $this->emit('previous');
    }

    public function resendCode()
    {
        $token = Otp::create([
            'active' => true
        ]);

        if ($token->sendCode(session('email'))) {
            session()->put("token_id", $token->id);
            session()->flash('message', "Verification code send again.");
        } else {
            // delete token because it can't be sent
            $token->delete();
            session()->flash('error', "Unable to send verification code. Try again.");
        }
    }

    /**
     * Store user and verify registration otp
     */
    public function submit()
    {
        // throttle for too many attempts
        if (! session()->has("token_id")) {
            return redirect("signup");
        }

        $token = Otp::find(session("token_id"));
        if (! $token || ! $token->isValid() || $this->code !== $token->code) {
            session()->flash('error', 'Verification code is invalid.');
            return;
        } else {
            $token->active = false;
            $token->save();

            User::create([
                'name' => session('name'),
                'email' => session('email'),
                'password' => bcrypt(session('password'))
            ]);
            
            // clear all session data
            session()->forget(['token_id', 'email', 'name', 'password']);
            
            session()->flash('message', 'Thank You for registering. Start Shopping!');
            return redirect('/login');
        }
    }

    public function render()
    {
        return view('livewire.registration.step2');
    }
}
