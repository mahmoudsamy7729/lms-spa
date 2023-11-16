<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.auth');
    }
    public function login()
    {
        $this->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        if ($user) {
            session()->flash('success', 'Login Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Invalid Credational');
        }
    }
}
