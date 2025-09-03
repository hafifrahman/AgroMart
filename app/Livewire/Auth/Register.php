<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Layout('components.layouts.guest')]
    #[Title('Register')]

    #[Validate('required|string|max:50|min:3|unique:users,name')]
    public string $name;

    #[Validate('required|string|email|lowercase|unique:users,email')]
    public string $email;

    #[Validate('required|string|max:50|min:8')]
    public string $password;

    public function store()
    {
        $this->validate();

        $user = User::create($this->validate());

        Auth::login($user);

        return $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
