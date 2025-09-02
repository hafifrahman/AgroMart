<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('Tentang Kami')]

    public function render()
    {
        return view('livewire.about');
    }
}
