<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Hubungi Kami')]

    #[Validate('required|string|max:50')]
    public string $name = '';

    #[Validate('required|email|max:50')]
    public string $email = '';

    #[Validate('required|string|max:500')]
    public string $message = '';

    public function mount()
    {
        $this->name = Auth::user()->name ?? '';
        $this->email = Auth::user()->email ?? '';
    }

    public function sendMessage()
    {
        if (!Auth::check()) {
            $this->dispatch('error', type: 'warning', message: 'Silakan login terlebih dahulu untuk mengirim pesan.');
            return;
        }

        $this->validate();

        $this->dispatch('message.sent', message: 'Pesan Anda telah terkirim. Terima kasih telah menghubungi kami!');
        $this->reset(['message']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
