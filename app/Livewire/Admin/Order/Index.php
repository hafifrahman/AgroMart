<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Pesanan')]

    public function render()
    {
        $orders = Order::with('user', 'items.product')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.order.index', [
            'orders' => $orders,
        ]);
    }
}
