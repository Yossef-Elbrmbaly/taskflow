<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('message', 'Login successful!');
            return redirect()->route('home');
        }
        else {
            session()->flash('error', 'Invalid credentials. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
