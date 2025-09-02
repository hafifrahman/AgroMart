<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Customer extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Pelanggan')]

    public function render()
    {
        $customers = User::where('role', 'customer')->get();

        return view('livewire.admin.customer', [
            'customers' => $customers,
        ]);
    }
}
