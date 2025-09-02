<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Layout('components.layouts.guest')]
    #[Title('Login')]

    #[Validate('required|string|email|lowercase')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public function store()
    {
        $this->validate();

        if (Auth::attempt($this->only('email', 'password'))) {
            if (Auth::user()->role == 'admin') {
                return $this->redirectRoute('admin.dashboard', navigate: true);
            } else {
                return $this->redirectRoute('home', navigate: true);
            }
        }

        $this->addError('login', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
