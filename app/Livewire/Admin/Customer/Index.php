<?php

namespace App\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Pelanggan')]

    public function render()
    {
        $customers = User::where('role', 'customer')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.customer.index', [
            'customers' => $customers,
        ]);
    }
}
