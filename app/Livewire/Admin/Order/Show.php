<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Detail Pesanan')]

    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order->load('user', 'items.product');
    }

    public function render()
    {
        return view('livewire.admin.order.show');
    }
}
