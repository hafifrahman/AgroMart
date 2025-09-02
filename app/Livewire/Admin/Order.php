<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Order extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Pesanan')]

    public function render()
    {
        return view('livewire.admin.order');
    }
}
