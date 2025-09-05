<?php

namespace App\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Detail Pelanggan')]

    public $customer;

    public function mount(User $customer)
    {
        $this->customer = $customer->load('orders.items.product');
    }

    public function render()
    {
        return view('livewire.admin.customer.show');
    }
}
