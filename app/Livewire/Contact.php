<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Hubungi Kami')]

    public string $name = '';
    public string $email = '';
    public string $message = '';

    public function mount()
    {
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
